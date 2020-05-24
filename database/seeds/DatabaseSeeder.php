<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Candidate;
use App\Model\Position;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        factory(App\User::class,5)->create();
//        factory(App\Model\Position::class,5)->create();
//        factory(App\Model\Candidate::class,20)->create();
//        factory(\App\Model\Vote::class,100)->create();
    }
}
