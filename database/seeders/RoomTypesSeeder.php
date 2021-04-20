<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->truncate();
        DB::table('room_types')->insert(
            [
                'name'=>'vip',
                'cost_first_hour'=>'2000000',
                'cost_next_hour'=>'1500000',
            ]
        ) ;
            
        DB::table('room_types')->insert([
            'name'=>'normal',
            'cost_first_hour'=>'1000000',
            'cost_next_hour'=>'700000',
        ]); 
            
    }
}
