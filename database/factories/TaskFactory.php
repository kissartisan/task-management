<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\Project;
use Faker\Generator as Faker;

$autoIncrement = 1;

$factory->define(Task::class, function (Faker $faker) use (&$autoIncrement) {
    return [
        'project_id' => factory(Project::class),
        'name' => $faker->bs,
        'priority' => $autoIncrement++,
    ];
});
