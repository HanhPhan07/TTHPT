<?php
use App\Models\Exam_list;
use Illuminate\Database\Seeder;

class ExamlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $so_exam = 10;

        $mon_hoc = ['Toán', 'Ngữ Văn', 'Anh Văn', 'Lý', 'Hóa', 'Sinh', 'Sử', 'Địa'];

        for ($sexam = 0; $sexam < $so_exam; $sexam++) {
            $exam = Exam_list::create([
                'id_exam' => $sexam + 1,
                'id_user' => $sexam + 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
