<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = ['Fiction & Literature','Non - Fiction','Other'];
        for($i = 0; $i < count($group);$i++){
            DB::table('genre_groups')->insert([
                'group_name' => $group[$i],
                'category_id'     => 3,
            ]);
        }
        
    }
}
