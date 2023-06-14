<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class HomeroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homerooms = [
            ['name' => '1-1', 'teacher_id'=> 9],
            ['name' => '1-2', 'teacher_id'=> 8],
            ['name' => '1-3', 'teacher_id'=> 7],
            ['name' => '2-1', 'teacher_id'=> 6],
            ['name' => '2-2', 'teacher_id'=> 5],
            ['name' => '2-3', 'teacher_id'=> 4],
            ['name' => '3-1', 'teacher_id'=> 3],
            ['name' => '3-2', 'teacher_id'=> 2],
            ['name' => '3-3', 'teacher_id'=> 1],
        ];
        DB::table('homerooms')->insert($homerooms);
    }
}
