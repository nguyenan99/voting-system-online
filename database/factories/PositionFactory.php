<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'position_name'=>$faker->word,
    ];
});
