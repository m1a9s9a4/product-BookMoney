<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BooksSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserStatusTypeSeeder::class);
        $this->call(UserBookStatusTypeSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(UserBooksSeeder::class);
    }
}
