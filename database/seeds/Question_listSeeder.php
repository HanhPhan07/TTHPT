<?php

use App\Models\QuestionList;
use Illuminate\Database\Seeder;

class Question_listSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $so_quest = 10;

        $mon_hoc = ['Toán', 'Ngữ Văn', 'Anh Văn', 'Lý', 'Hóa', 'Sinh', 'Sử', 'Địa'];

        for ($stu = 0; $stu < $so_quest; $stu++) {
            for ($so_que=0; $so_que<30; $so_que++){
            $student = QuestionList::create([
                'id_exam' => $stu+1,
                'id_question' => rand(1,100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            }
        }

        // for ($so_que=0; $so_que<9; $so_que++){
        //     $student = QuestionList::create([
        //         'id_exam' => 256,
        //         'id_question' => rand(1,100),
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }
    }
}
