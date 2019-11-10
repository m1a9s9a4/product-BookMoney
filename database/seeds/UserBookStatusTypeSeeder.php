<?php

use Illuminate\Database\Seeder;

class UserBookStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_book_status_type')->insert([
            'id' => 1,
            'name' => '積読中',
        ]);

        DB::table('user_book_status_type')->insert([
            'id' => 2,
            'name' => '完読',
        ]);
    }
}
