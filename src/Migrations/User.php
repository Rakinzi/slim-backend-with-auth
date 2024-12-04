<?php

namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class UserMigration
{
    public function __invoke(Capsule $capsule)
    {
        // echo("One");
        if (!$capsule::schema()->hasTable('users')) {
            $capsule::schema()->create('users', function ($table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->timestamps();
            });
        }
    }
}
