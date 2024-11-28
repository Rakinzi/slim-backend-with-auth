<?php

use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use \Slim\Middleware\Session;
use DI\Container;

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

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $container->get('view')));

// Add Error Middleware
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Register routes
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../src/routes.php';

return $app;