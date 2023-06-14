<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class StudentSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relation = [
            ['student_id' => 1, 'subject_id' => 1],
            ['student_id' => 1, 'subject_id' => 4],
            ['student_id' => 1, 'subject_id' => 7],
            ['student_id' => 1, 'subject_id' => 10],
            ['student_id' => 1, 'subject_id' => 13],

            ['student_id' => 2, 'subject_id' => 1],
            ['student_id' => 2, 'subject_id' => 4],
            ['student_id' => 2, 'subject_id' => 7],
            ['student_id' => 2, 'subject_id' => 16],

            ['student_id' => 3, 'subject_id' => 1],
            ['student_id' => 3, 'subject_id' => 4],
            ['student_id' => 3, 'subject_id' => 7],
            ['student_id' => 3, 'subject_id' => 17],

            ['student_id' => 4, 'subject_id' => 1],
            ['student_id' => 4, 'subject_id' => 4],
            ['student_id' => 4, 'subject_id' => 7],
            ['student_id' => 4, 'subject_id' => 15],

            ['student_id' => 5, 'subject_id' => 1],
            ['student_id' => 5, 'subject_id' => 4],
            ['student_id' => 5, 'subject_id' => 7],
            ['student_id' => 5, 'subject_id' => 10],
            ['student_id' => 5, 'subject_id' => 15],

            ['student_id' => 6, 'subject_id' => 1],
            ['student_id' => 6, 'subject_id' => 4],
            ['student_id' => 6, 'subject_id' => 7],
            ['student_id' => 6, 'subject_id' => 15],
            ['student_id' => 6, 'subject_id' => 17],

            ['student_id' => 7, 'subject_id' => 1],
            ['student_id' => 7, 'subject_id' => 4],
            ['student_id' => 7, 'subject_id' => 7],
            ['student_id' => 7, 'subject_id' => 10],
            ['student_id' => 7, 'subject_id' => 13],

            ['student_id' => 8, 'subject_id' => 1],
            ['student_id' => 8, 'subject_id' => 4],
            ['student_id' => 8, 'subject_id' => 7],
            ['student_id' => 8, 'subject_id' => 13],
            ['student_id' => 8, 'subject_id' => 17],

            ['student_id' => 9, 'subject_id' => 1],
            ['student_id' => 9, 'subject_id' => 4],
            ['student_id' => 9, 'subject_id' => 7],
            ['student_id' => 9, 'subject_id' => 13],
            ['student_id' => 9, 'subject_id' => 17],

            ['student_id' => 10, 'subject_id' => 2],
            ['student_id' => 10, 'subject_id' => 5],
            ['student_id' => 10, 'subject_id' => 8],
            ['student_id' => 10, 'subject_id' => 11],
            ['student_id' => 10, 'subject_id' => 14],

            ['student_id' => 11, 'subject_id' => 2],
            ['student_id' => 11, 'subject_id' => 5],
            ['student_id' => 11, 'subject_id' => 8],
            ['student_id' => 11, 'subject_id' => 14],
            ['student_id' => 11, 'subject_id' => 16],

            ['student_id' => 12, 'subject_id' => 2],
            ['student_id' => 12, 'subject_id' => 5],
            ['student_id' => 12, 'subject_id' => 8],
            ['student_id' => 12, 'subject_id' => 11],
            ['student_id' => 12, 'subject_id' => 14],

            ['student_id' => 13, 'subject_id' => 2],
            ['student_id' => 13, 'subject_id' => 5],
            ['student_id' => 13, 'subject_id' => 8],
            ['student_id' => 13, 'subject_id' => 11],
            ['student_id' => 13, 'subject_id' => 16],
            ['student_id' => 13, 'subject_id' => 18],

            ['student_id' => 14, 'subject_id' => 2],
            ['student_id' => 14, 'subject_id' => 5],
            ['student_id' => 14, 'subject_id' => 8],
            ['student_id' => 14, 'subject_id' => 14],

            ['student_id' => 15, 'subject_id' => 2],
            ['student_id' => 15, 'subject_id' => 5],
            ['student_id' => 15, 'subject_id' => 8],

            ['student_id' => 16, 'subject_id' => 2],
            ['student_id' => 16, 'subject_id' => 5],
            ['student_id' => 16, 'subject_id' => 8],

            ['student_id' => 17, 'subject_id' => 2],
            ['student_id' => 17, 'subject_id' => 5],
            ['student_id' => 17, 'subject_id' => 8],

            ['student_id' => 18, 'subject_id' => 2],
            ['student_id' => 18, 'subject_id' => 5],
            ['student_id' => 18, 'subject_id' => 8],

            ['student_id' => 19, 'subject_id' => 3],
            ['student_id' => 19, 'subject_id' => 6],
            ['student_id' => 19, 'subject_id' => 9],

            ['student_id' => 20, 'subject_id' => 3],
            ['student_id' => 20, 'subject_id' => 6],
            ['student_id' => 20, 'subject_id' => 9],
            ['student_id' => 20, 'subject_id' => 12],
            ['student_id' => 20, 'subject_id' => 16],
            ['student_id' => 20, 'subject_id' => 18],

            ['student_id' => 21, 'subject_id' => 3],
            ['student_id' => 21, 'subject_id' => 6],
            ['student_id' => 21, 'subject_id' => 9],
            ['student_id' => 21, 'subject_id' => 12],

            ['student_id' => 22, 'subject_id' => 3],
            ['student_id' => 22, 'subject_id' => 6],
            ['student_id' => 22, 'subject_id' => 9],
            ['student_id' => 22, 'subject_id' => 12],

            ['student_id' => 23, 'subject_id' => 3],
            ['student_id' => 23, 'subject_id' => 6],
            ['student_id' => 23, 'subject_id' => 9],
            ['student_id' => 23, 'subject_id' => 12],

            ['student_id' => 24, 'subject_id' => 3],
            ['student_id' => 24, 'subject_id' => 6],
            ['student_id' => 24, 'subject_id' => 9],
            ['student_id' => 24, 'subject_id' => 12],

            ['student_id' => 25, 'subject_id' => 3],
            ['student_id' => 25, 'subject_id' => 6],
            ['student_id' => 25, 'subject_id' => 9],
            ['student_id' => 25, 'subject_id' => 12],

            ['student_id' => 26, 'subject_id' => 3],
            ['student_id' => 26, 'subject_id' => 6],
            ['student_id' => 26, 'subject_id' => 9],
            ['student_id' => 26, 'subject_id' => 12],

            ['student_id' => 27, 'subject_id' => 3],
            ['student_id' => 27, 'subject_id' => 6],
            ['student_id' => 27, 'subject_id' => 9],
            ['student_id' => 27, 'subject_id' => 12],
        ];
        DB::table('student_subject')->insert($relation);
    }
}
