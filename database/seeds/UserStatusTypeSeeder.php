<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status_type')->insert([
            'id' => 1,
            'name' => 'active',
        ]);

        DB::table('user_status_type')->insert([
            'id' => 2,
            'name' => 'inactive',
        ]);
    }
}
