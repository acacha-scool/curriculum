<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Scool\Curriculum\Models\Period::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'name' => $faker->word,
    ];
});
