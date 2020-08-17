<?php
use App\Models\Examlist;
use App\Models\Student;
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
        //$idstudent= Student::get(['id']);
        $so_exam = 10;

        $mon_hoc = ['Toán', 'Ngữ Văn', 'Anh Văn', 'Lý', 'Hóa', 'Sinh', 'Sử', 'Địa'];

        for ($sexam = 0; $sexam < $so_exam; $sexam++) {
            $exam = Examlist::create([
                'id_exam' => $sexam + 1,
                'id_student' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
