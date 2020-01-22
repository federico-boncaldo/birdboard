<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\Project;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'completed' => false,
        //it's not necessary to create a closure to get the project_id
        'project_id' => factory(Project::class)
     ];
});
