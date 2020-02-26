<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {
    return [
        'group_id' => random_int(\DB::table('groups')->min('id'), \DB::table('groups')->max('id')),
        'name' => $faker->unique()->text($maxNbChars = 16),
        'description' => $faker->text($maxNbChars = 255)
    ];
});
