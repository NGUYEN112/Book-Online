<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Computer','Cooking','Education','Fiction','Health','Mathematic','Medical','References','Science'];
        for ($i = 0; $i < count($categories); $i++) {
            DB::table('categories')->insert([
                'category_name' => $categories[$i],
            ]);
        }
    }
}
