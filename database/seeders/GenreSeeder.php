<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // $group = ['Fiction & Literature','Non - Fiction','Other'];
        $fiction = ['Children','Science Fiction','Fantasy','Mystery','Romance','Horror','Poetry','Literature','Crime'];
        $none = ['Comic','Cook'];

            for($j= 0;$j<count($fiction);$j++){
                DB::table('genres')->insert([
                    'group_id' => 1,
                    'category_id'     => 3,
                    'genre_name' => $fiction[$j]
                ]);
            }

            for($i= 0;$i<count($none);$i++){
                DB::table('genres')->insert([
                    'group_id' => 2,
                    'category_id'     => 3,
                    'genre_name' => $fiction[$i]
                ]);
            }
            
    }
}
