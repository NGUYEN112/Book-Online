<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'full_name' => 'Robert Downey Jr.',
            'email'     => 'ironman@email.com',
            'password'  => bcrypt('123123'),
            'phone_number' => '0123123123',
            'avatar'    => 'none',
            'role'      => 0
        ]);
    }
}
