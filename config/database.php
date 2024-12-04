<?php

use App\Migrations\ProjectsMigration as ProjectsMigration;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Migrations\UserMigration as UserMigration;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'slim_auth',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Create the database and tables
try {
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->exec("CREATE DATABASE IF NOT EXISTS slim_auth");
    
    ProjectsMigration::table($capsule);
    UserMigration::class;
   
} catch (\Exception $e) {
    die("Could not create database: " . $e->getMessage());
}

return $capsule; 