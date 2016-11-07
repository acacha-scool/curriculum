<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Scool\Curriculum\Models\Submodule::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});
