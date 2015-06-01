<?php

use Illuminate\Database\Seeder;
use Camp\User;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(['username' => 'admin', 'email' => 'admin@phpcamp.com', 'password' => Hash::make('admin')]);
    }

}