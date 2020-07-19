<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request){
        if(Auth::check()){
            return redirect('admin/home');
        }
        else
            return redirect('admin/login');
    }

    public function getLogin(Request $request) {

        return view('auth.login',['title'=>'Login']);
    }
    public function postLogin(Request $request) {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'username' =>'required',
            'password' => 'required'
        ];
        $messages = [
            'username.required' => 'Username là trường bắt buộc',
            'password.required' => 'Mật khẩu là trường bắt buộc',
        ];
        $validator = Validator::make(request()->all(), $rules, $messages);


        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('ad')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            // $username = Request::get('username');
            // $password = Request::get('password');
            // $username = request()->input('username');
            // $password = request()->input('password');
            // $credentials = [
            //     'username' => $request['username'],
            //     'password' => $request['password'],
            // ];

            $username = Request::get('username');
            $password = Request::get('password');

            if( Auth::attempt((array('username' => $username, 'password' => $password))))
            {
                //Request::session()->put('login', true);
                $result['status']=1;

            } else {
                $result['status']=0;
                $result['uesrname']=$username;
                $result['password']=$password;
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                // Session::flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
                // return redirect('admin');
            }
            return json_encode($result);
        }
    }
}
