<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Candidate;
use Faker\Generator as Faker;
use App\Model\Position;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'candidate_name'=> $faker->word(),
        'position_id' => function(){
        return Position::all()->random();
        }

    ];
});
