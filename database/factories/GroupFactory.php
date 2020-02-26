<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text($maxNbChars = 16),
        'description' => $faker->text($maxNbChars = 255)
    ];
});
