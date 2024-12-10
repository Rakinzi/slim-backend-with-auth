<?php
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\ProjectsController;
use App\Controllers\UserController;
use App\Controllers\SqlInjectionController;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) use ($container) {


    // Protected Routes
    $app->group('/secure', function (RouteCollectorProxy $group) {
        $group->get('/', [HomeController::class, 'dashboard'])->setName('secure.dashboard');
        $group->get('/profile', [UserController::class, 'show'])->setName('secure.profile');
        $group->get('/logout', [AuthController::class, 'logout'])->setName('secure.logout');
        $group->get('/projects', [ProjectsController::class, 'show'])->setName('secure.projects');
        $group->group('/sql_injection', function (RouteCollectorProxy $sqlGroup) {
            $sqlGroup->get('/', [SqlInjectionController::class, 'show'])->setName('sqli.dashboard');
            $sqlGroup->get('/activities', [SqlInjectionController::class, 'activities'])->setName('sqli.activities');
            $sqlGroup->get('/payloads', [SqlInjectionController::class, 'payloads'])->setName('sqli.payloads');
        });
    })->add($container->get(\App\Middleware\AuthMiddleware::class));

    // Public Routes
    $app->get('/', [HomeController::class, 'index'])->setName('home');

    // Auth routes
    $app->get('/login', [AuthController::class, 'login'])->setName('login');
    $app->post('/login', [AuthController::class, 'postLogin'])->setName('login.post');
    $app->get('/register', [AuthController::class, 'register'])->setName('register');
    $app->post('/register', [AuthController::class, 'postRegister'])->setName('register.post');
    $app->get('/logout', [AuthController::class, 'logout'])->setName('logout');
};