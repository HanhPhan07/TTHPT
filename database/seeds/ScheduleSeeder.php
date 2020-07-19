<?php
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $so_row = 10;

        $mon_hoc = ['Toán', 'Ngữ Văn', 'Anh Văn', 'Lý', 'Hóa', 'Sinh', 'Sử', 'Địa'];

        for ($row = 0; $row < $so_row; $row++) {
            $schedule = Schedule::create([
                'id_subject' => $row + 1,
                'test_date' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
