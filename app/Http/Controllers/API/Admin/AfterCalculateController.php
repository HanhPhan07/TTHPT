<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Services\ResultService;

class AfterCalculateController extends Controller
{
    private $resultService;

    public function __construct(ResultService $resultService)
    {
        $this->url=config('api.url');
        $this->resultService= $resultService;
    }

    public function index()
    {
        //var_dump($this->resultService->resultCalculate());
        //$data['mark']= $this->resultService->resultCalculate();
        $data['mark']= Result::with('student')->get();
        return view('admin.result.calculate',$data);
    }
}
