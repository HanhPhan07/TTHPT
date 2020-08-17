<?php

use App\Models\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $so_exam = 10;

        $mon_hoc = ['Toán', 'Ngữ Văn', 'Anh Văn', 'Lý', 'Hóa', 'Sinh', 'Sử', 'Địa'];

        for ($exa = 0; $exa < $so_exam; $exa++) {
            $exam = Exam::create([
                'id_subject' => rand(1,8),
                'number' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
