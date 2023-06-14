<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['name' => 'Japanese_1'], // id: 1
            ['name' => 'Japanese_2'], // id: 2
            ['name' => 'Japanese_3'], // id: 3
            ['name' => 'English_1'], // id: 4
            ['name' => 'English_2'], // id: 5
            ['name' => 'English_3'], // id: 6
            ['name' => 'Math_1'], // id: 7
            ['name' => 'Math_2'], // id: 8
            ['name' => 'Math_3'], // id: 9
            ['name' => 'Math_A'], // id: 10
            ['name' => 'Math_B'], // id: 11
            ['name' => 'Math_C'], // id: 12
            ['name' => 'Biology_1'], // id: 13
            ['name' => 'Biology_2'], // id: 14
            ['name' => 'Chemistry_1'], // id: 15
            ['name' => 'Chemistry_2'], // id: 16
            ['name' => 'Physics_1'], // id: 17
            ['name' => 'Physics_2'], // id: 18
        ];
        DB::table('subjects')->insert($subjects);
    }
}
