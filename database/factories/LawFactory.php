<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Scool\Curriculum\Models\Law::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});
