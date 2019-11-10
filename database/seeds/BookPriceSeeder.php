<?php

use Illuminate\Database\Seeder;

class BookPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_price')->insert([
            'id' => 1,
            'book_id' => 1,
            'price' => 988,
        ]);

        DB::table('book_price')->insert([
            'id' => 2,
            'book_id' => 2,
            'price' => 2000,
        ]);
    }
}
