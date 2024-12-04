<?php

use Slim\App;
use Slim\Middleware\MethodOverrideMiddleware;
use Slim\Views\TwigMiddleware;
use App\Middleware\AuthMiddleware;

return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add the Routing Middleware
    $app->addRoutingMiddleware();

    // Add Method Override Middleware
    $app->add(new MethodOverrideMiddleware());


    $app->add(AuthMiddleware::class);

    // Add Error Middleware
    $errorMiddleware = $app->addErrorMiddleware(true, true, true);

    // Session Middleware
    $app->add(function ($request, $handler) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        return $handler->handle($request);
    });

    // CSRF Protection Middleware
    $app->add(function ($request, $handler) {
        $response = $handler->handle($request);
        return $response
            ->withHeader('X-Frame-Options', 'DENY')
            ->withHeader('X-XSS-Protection', '1; mode=block')
            ->withHeader('X-Content-Type-Options', 'nosniff');
    });

    // Global Middleware to pass session data to Twig
    $app->add(function ($request, $handler) {
        $view = $this->get('view');
        $view->getEnvironment()->addGlobal('session', $_SESSION ?? []);
        $view->getEnvironment()->addGlobal('flash', $_SESSION['flash'] ?? []);
        return $handler->handle($request);
    });

};
