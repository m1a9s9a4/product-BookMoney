<?php

use Illuminate\Database\Seeder;

class UserBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_books')->insert([
            'user_id' => 1,
            'book_id' => 1,
            'status_id' => 1,
        ]);
    }
}
