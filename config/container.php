<?php

use DI\Container;
use Slim\Views\Twig;
use GuzzleHttp\Client;
use DI\ContainerBuilder;
use App\Utils\PdfGenerator;
use Twig\Loader\FilesystemLoader;
use App\Controllers\PdfController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Middleware\ErrorMiddleware;
use App\Controllers\ProjectsController;
use App\Controllers\SqlInjectionController;
use App\Utils\CsrfGuard;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    // Twig configuration
    'view' => function (Container $c) {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        return new Twig($loader, [
            'cache' => __DIR__.'/../cache',
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
    },
    
    ErrorMiddleware::class => function (Container $c) {
        return new ErrorMiddleware($c->get('view'));
    },

    PdfGenerator::class => function () {
        return new PdfGenerator();
    },

    PdfController::class => function ($container) {
        return new PdfController(
            $container->get('view'),
            $container->get(PdfGenerator::class)
        );
    },
]);

return $containerBuilder->build();
