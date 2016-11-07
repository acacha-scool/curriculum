<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Scool\Curriculum\Models\Speciality::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'code' => $faker->numberBetween(500,699)
    ];
});
