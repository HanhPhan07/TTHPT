<?php

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $so_sub = 8;

        $mon_hoc = ['Toán', 'Ngữ Văn', 'Anh Văn', 'Lý', 'Hóa', 'Sinh', 'Sử', 'Địa'];

        for ($sub = 0; $sub < $so_sub; $sub++) {
            $subject = Subject::create([
                'name' => $mon_hoc[$sub],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
