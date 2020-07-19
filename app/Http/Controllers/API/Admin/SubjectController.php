<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{

    private $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = $this->subjectService->getListSubject();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
        return view('admin.subject.subject', ['title' => 'Môn học'], ['custom_js' => 'admin/dist/js/subject.js']);
    }

    public function doInsert(Request $request){
        
        $this->subjectService->addSub($request->all());

    }

    public function doDelete($id){
        $this->subjectService->deleteSub($id);
    }

    public function doUpdate(Request $request){
        return $this->subjectService->updateSub($request->id, $request->all());
    }
}
