<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;

class AfterCalculateController extends Controller
{
    public function index()
    {
        $data['mark']= Result::with('student')->get();
        return view('admin.result.calculate',$data);
    }
}
