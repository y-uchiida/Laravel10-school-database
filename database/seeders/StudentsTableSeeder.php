<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            ['name' => 'student_1-1-1', 'homeroom_id' => 1],
            ['name' => 'student_1-1-2', 'homeroom_id' => 1],
            ['name' => 'student_1-1-3', 'homeroom_id' => 1],

            ['name' => 'student_1-2-1', 'homeroom_id' => 2],
            ['name' => 'student_1-2-2', 'homeroom_id' => 2],
            ['name' => 'student_1-2-3', 'homeroom_id' => 2],

            ['name' => 'student_1-3-1', 'homeroom_id' => 3],
            ['name' => 'student_1-3-2', 'homeroom_id' => 3],
            ['name' => 'student_1-3-3', 'homeroom_id' => 3],

            ['name' => 'student_2-1-1', 'homeroom_id' => 4],
            ['name' => 'student_2-1-2', 'homeroom_id' => 4],
            ['name' => 'student_2-1-3', 'homeroom_id' => 4],

            ['name' => 'student_2-2-1', 'homeroom_id' => 5],
            ['name' => 'student_2-2-2', 'homeroom_id' => 5],
            ['name' => 'student_2-2-3', 'homeroom_id' => 5],

            ['name' => 'student_2-3-1', 'homeroom_id' => 6],
            ['name' => 'student_2-3-2', 'homeroom_id' => 6],
            ['name' => 'student_2-3-3', 'homeroom_id' => 6],

            ['name' => 'student_3-1-1', 'homeroom_id' => 7],
            ['name' => 'student_3-1-2', 'homeroom_id' => 7],
            ['name' => 'student_3-1-3', 'homeroom_id' => 7],

            ['name' => 'student_3-2-1', 'homeroom_id' => 8],
            ['name' => 'student_3-2-2', 'homeroom_id' => 8],
            ['name' => 'student_3-2-3', 'homeroom_id' => 8],

            ['name' => 'student_3-3-1', 'homeroom_id' => 9],
            ['name' => 'student_3-3-2', 'homeroom_id' => 9],
            ['name' => 'student_3-3-3', 'homeroom_id' => 9],
        ];

        DB::table('students')->insert($students);
    }
}
