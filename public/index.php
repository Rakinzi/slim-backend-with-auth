<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Get the application instance
$app = require __DIR__ . '/../bootstrap/app.php';

// Run the application
$app->run();