<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\SqlInjectionMiddleware;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Middleware\MethodOverrideMiddleware;

require __DIR__ . '/../vendor/autoload.php';


// Create Container
/** @var Container $container */
$container = require __DIR__ . '/../config/container.php';

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

// Create App
$app = AppFactory::create();


// Add Routing Middleware
$app->addRoutingMiddleware();

$app->addBodyParsingMiddleware();

$app->add(new MethodOverrideMiddleware());
// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $container->get('view')));

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

// Add Error Middleware
$errorMiddleware = $app->addErrorMiddleware(true, true, true);



// Register routes
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../src/routes.php';

return $app;
