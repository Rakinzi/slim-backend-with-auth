<?php

namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class ProjectsMigration
{
    public static function table(Capsule $capsule)
    {  
        if (!$capsule::schema()->hasTable('projects')) {
  
            $capsule::schema()->create('projects', function ($table) {
                $table->increments('project_id');
                $table->string('project_name')->unique();
                $table->string('project_description')->nullable();
                $table->timestamps();
            });
        }
    }
}
