<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Technology;
use Faker\Generator as Faker;

$factory->define(Technology::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['HTML5', 'CSS3', 'Javascript', 'Bootstrap', 'PHP', 'MySQL'])
    ];
});
