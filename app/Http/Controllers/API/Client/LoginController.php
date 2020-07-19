<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->middleware('guest')->except('logout');
        $this->studentService = $studentService;
    }

    public function index() {
        if(Session::has('loginStudent')&&Session::get('loginStudent')==true){
            return redirect('/home');
        }else{
            return redirect('/login');
        }
    }

    public function getLogin(Request $request) {

        return view('client.home.login',['title'=>'Login']);
    }
    public function postLogin(Request $request) {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'username' =>'required',
            'password' => 'required'
        ];
        // $messages = [
        //     'username.required' => 'Username là trường bắt buộc',
        //     'password.required' => 'Mật khẩu là trường bắt buộc',
        // ];
        $validator = Validator::make(request()->all(), $rules);


        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('/')->withErrors($validator)->withInput();
        } else {

            $username = Request::get('username');
            $password = Request::get('password');
            if( Student::where('username','=',$username)->where('password','=', $password)->count()==1)
            {
                $student= Student::where('username','=',$username)->where('password','=', $password)->get();
                if($student->first()->isActive==1){
                    $result['status']=2;
                }
                else{
                    $id=$student->first()->id;
                    Request::session()->put('loginStudent', true);
                    Request::session()->put('id', $id);
                    Request::session()->put('fullname', $student->first()->fullname);
                    $this->studentService->setIsA($id,1);
                    $result['status']=1;
                }
            }
             else {
                $result['status']=0;
                $result['userrname']=$username;
                $result['password']=$password;
            }
            return json_encode($result);
        }
    }
    public function getLogout()
    {
        if(Session::has('loginStudent') && Session::get('loginStudent') == true){
            $id=Session::get('id');
            $this->studentService->setIsA($id,0);
            Request::session()->flush();
            return redirect('/');
        }
    }
}
