<?php

use DI\Container;
use DI\ContainerBuilder;
use Slim\Views\Twig;
use Twig\Loader\FilesystemLoader;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ProjectsController;
use App\Controllers\UserController;
use App\Middleware\SqlInjectionMiddleware;
use App\Controllers\SqlInjectionController;
use GuzzleHttp\Client;

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

    'client' => function (Container $c) {
        return new Client();
    },

    // Controllers
    HomeController::class => function (Container $c) {
        return new HomeController($c->get('view'));
    },

    AuthController::class => function (Container $c) {
        return new AuthController($c->get('view'), $c->get('client'));
    },

    UserController::class => function (Container $c) {
        return new UserController($c->get('view'));
    },

    ProjectsController::class => function (Container $c) {
        return new ProjectsController($c->get('view'), $c->get('client'));
    },

    SqlInjectionController::class => function (Container $c){
        return new SqlInjectionController($c->get('view'), $c->get('client'));
    }
]);

return $containerBuilder->build();
