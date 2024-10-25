<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use Slim\Routing\RouteCollectorProxy;

// Home routes
$app->get('/', [HomeController::class, 'index']);
$app->get('/dashboard', [HomeController::class, 'dashboard']);

// Auth routes
$app->get('/login', [AuthController::class, 'login']);
$app->post('/login', [AuthController::class, 'postLogin']);
$app->get('/register', [AuthController::class, 'register']);
$app->post('/register', [AuthController::class, 'postRegister']);
$app->post('/logout', [AuthController::class, 'logout']);