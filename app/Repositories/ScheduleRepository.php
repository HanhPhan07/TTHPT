<?php

namespace App\Repositories;

use App\Models\Schedule;
use Carbon\Carbon;
class ScheduleRepository  extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Schedule::class;
    }

    public function getIdSubject()
    {
        $time=\Carbon\Carbon::parse(now());

        //dd($time);
        $schedule = Schedule::whereDate('test_date',now());
        //dd($schedule);
        $dt = Carbon::now();
        $dt->setTime(12, 00, 00)->toDateTimeString();
        if($time > $dt) $sign='>';
        else $sign='<';
        //dd($schedule->where('test_date',$sign,$dt)->value('id_subject'));
        return $schedule->where('test_date',$sign,$dt)->value('id_subject');

    }
    public function getListSchedule(){
        return Schedule::with('subject')
                        ->get();
    }
}
