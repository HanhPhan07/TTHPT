<?php

use App\Models\Exam;
use App\Models\Exam_list;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Question_list;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            Student::class,
            Subject::class,
            Schedule::class,
            Question::class,
            Exam::class,
            Question_list::class,
            Exam_list::class
            ]);

    }
}
