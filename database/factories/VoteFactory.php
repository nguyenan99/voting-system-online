<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Vote;
use Faker\Generator as Faker;
use App\User;
use App\Model\Candidate;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'voter_id' => function(){
            $arr  =  User::query()->where('role',0)
            ->select('users.id')
                ->get();
             return $arr->random();
        },
        'cadidate_id' => function(){
            return Candidate::all()->random();
        }


    ];
});
