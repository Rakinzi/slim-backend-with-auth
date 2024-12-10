<?php
date_default_timezone_set('Africa/Harare');
use DI\Container;
use Slim\Csrf\Guard;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteContext;
use Slim\Views\TwigMiddleware;
use App\Middleware\ErrorMiddleware;
use App\Middleware\SqlInjectionMiddleware;
use Selective\BasePath\BasePathMiddleware;
use Slim\Middleware\MethodOverrideMiddleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

require __DIR__ . '/../vendor/autoload.php';

// Create Container
/** @var Container $container */
$container = require __DIR__ . '/../config/container.php';

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

// Create App
$app = AppFactory::create();
$responseFactory = $app->getResponseFactory();

$app->add(TwigMiddleware::create($app, $container->get('view')));

$middleware = function ($request, $handler) use ($container) {
    $routeContext = RouteContext::fromRequest($request);
    $routeName = $routeContext->getRoute()?->getName();
    $container->get('view')->getEnvironment()->addGlobal('currentRoute', $routeName);
    return $handler->handle($request);
};
$app->add($middleware);

// Add Routing Middleware
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->add(new MethodOverrideMiddleware());

// Register Middleware On Container
$container->set('csrf', function () use ($responseFactory) {
    return new Guard($responseFactory);
});

// $app->add($container->get('csrf'));

// Add Error Middleware
$app->add(ErrorMiddleware::class);

$app->add(SqlInjectionMiddleware::class);

// CSRF Protection Middleware
$app->add(function (Request $request, RequestHandler $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('X-Frame-Options', 'DENY')
        ->withHeader('X-XSS-Protection', '1; mode=block')
        ->withHeader('X-Content-Type-Options', 'nosniff');
});

$app->add(function (Request $request, RequestHandler $handler) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    return $handler->handle($request);
});

$app->add(new BasePathMiddleware($app));


// Require database configuration
require __DIR__ . '/../config/database.php';

// Load and apply routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

return $app;