<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Scool\Curriculum\Models\Submodule::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'name' => $faker->word,
        'total_hours' => $faker->numberBetween(10,50),
        'week_hours' => $faker->numberBetween(1,6),
        'start_date' => $faker->date(),
        'finish_date' => $faker->date(),
    ];
});
