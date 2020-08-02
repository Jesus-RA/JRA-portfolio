<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->sentence(10),
        'repository' => $faker->url,
        'url' => $faker->url
    ];
});
