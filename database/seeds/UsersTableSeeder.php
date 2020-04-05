<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Isrrael Peña',
                'email'          => 'isrrael@lapaz.bo',
                'password'       => '$2y$10$mqVJxOOJ4VEa8yfmq1HC/uz72WO8LG5o5/Q6fVP5aDEdXSSdf89tK',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
