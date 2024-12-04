<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\ProjectsController;
use App\Controllers\UserController;
use App\Controllers\SqlInjectionController;
use Slim\Routing\RouteCollectorProxy;

use Slim\Exception\HttpNotFoundException;

// Protected Routes
$app->group('/secure', function (RouteCollectorProxy $group) {
    $group->get('/', [HomeController::class, 'dashboard']);
    $group->get('/profile', [UserController::class, 'show']);
    $group->get('/logout', [AuthController::class, 'logout']);
    $group->get('/projects', [ProjectsController::class, 'show']);
    $group->get('/sql_injection', [SqlInjectionController::class, 'show']);
})->add($container->get(\App\Middleware\AuthMiddleware::class));

$app->get('/', [HomeController::class, 'index']);
// Auth routes
$app->get('/login', [AuthController::class, 'login']);
$app->post('/login', [AuthController::class, 'postLogin']);
$app->get('/register', [AuthController::class, 'register']);
$app->post('/register', [AuthController::class, 'postRegister']);
