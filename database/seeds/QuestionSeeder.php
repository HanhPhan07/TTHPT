<?php

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class QuestionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $so_que = 100;
        $ans = ['Đáp án đúng','Đáp án sai', 'Đáp án sai', 'Đáp án sai'];
        $correct = ['A', 'B', 'C', 'D'];



        for ($que = 1; $que < $so_que+1; $que++) {
            $shuffle = Arr::shuffle($ans);
            $tam=-1;
            for ($i=0;$i<count($shuffle);$i++){
                if ($shuffle[$i]=="Đáp án đúng") $tam=$i;
            }
            $question = Question::create([
                'id' => $que,
                'ans_1' => $shuffle[0],
                'ans_2' => $shuffle[1],
                'ans_3' => $shuffle[2],
                'ans_4' => $shuffle[3],
                'ans_correct' => $correct[$tam],
                'id_subject' => rand(1, 8),
                'question_content' => 'Đố bạn: Content_'.$que,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
