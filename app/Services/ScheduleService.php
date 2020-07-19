<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;

class ScheduleService
{
    private $scheduleRepository;

    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    // public function getExamList(){
    //     return $this->examListRepository->getAll();
    // }
    public function getScheduleList()
    {
        return $this->scheduleRepository->getListSchedule();
    }

    public function create(array $schedule)
    {
        return $this->scheduleRepository->create($schedule);
    }

    public function delete(int $id){
        return $this->scheduleRepository->delete($id);
    }
}
