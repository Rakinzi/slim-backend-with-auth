<?php

use DI\Container;
use DI\ContainerBuilder;
use Slim\Views\Twig;
use Twig\Loader\FilesystemLoader;
use App\Controllers\AuthController;
use App\Controllers\HomeController;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    // Twig configuration
    'view' => function (Container $c) {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        return new Twig($loader, [
            'cache' => false,
            'debug' => true,
            'auto_reload' => true
        ]);
    },
    
    // Controllers
    HomeController::class => function (Container $c) {
        return new HomeController($c->get('view'));
    },
    
    AuthController::class => function (Container $c) {
        return new AuthController($c->get('view'));
    }
]);

return $containerBuilder->build();