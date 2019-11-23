<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'masa',
            'email' => 'test_1@test.com',
            'password' => Hash::make('bookismoney'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'fumi',
            'email' => 'test_2@test.com',
            'password' => Hash::make('bookismoney'),
        ]);
    }
}
