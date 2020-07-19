<?php
use App\Models\Tasks;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $so_task = 10;

        $answer = ['A', 'B', 'C', 'D'];
        for ($st = 0; $st < $so_task; $st++) {
            $task = Tasks::create([
                'answer_selected' => $answer[rand(0,3)],
                'id_exam' => $st+1,
                'id_user' => $st+1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
