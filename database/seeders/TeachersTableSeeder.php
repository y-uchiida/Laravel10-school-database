<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [
            ['name' => 'teacher_1'],
            ['name' => 'teacher_2'],
            ['name' => 'teacher_3'],
            ['name' => 'teacher_4'],
            ['name' => 'teacher_5'],
            ['name' => 'teacher_6'],
            ['name' => 'teacher_7'],
            ['name' => 'teacher_8'],
            ['name' => 'teacher_9'],
        ];
        DB::table('teachers')->insert($teachers);
    }
}
