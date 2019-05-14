<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{


    public function run()
    {
        $user = User::updateOrCreate(
            ['email' => 'jill@harvard.edu', 'name' => 'Jill Harvard'],
            ['password' => Hash::make('helloworld')
            ]);

        $user = User::updateOrCreate(
            ['email' => 'jamal@harvard.edu', 'name' => 'Jamal Harvard'],
            ['password' => Hash::make('helloworld')
            ]);

        $user = User::updateOrCreate(
            ['email' => 'a@a.com', 'name' => 'a a'],
            ['password' => Hash::make('helloworld')
            ]);

        $user = User::updateOrCreate(
            ['email' => 'b@b.com', 'name' => 'b b'],
            ['password' => Hash::make('helloworld')
            ]);

        $user = User::updateOrCreate(
            ['email' => 'c@c.com', 'name' => 'c c'],
            ['password' => Hash::make('helloworld')
            ]);
    }
}
