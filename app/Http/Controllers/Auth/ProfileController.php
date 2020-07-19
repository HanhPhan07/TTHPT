<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
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
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request){
        return view('auth.profile');
    }

    public function update(Request $request){
        $id = $request::get('id');
        $user=User::findOrFail($id);
        // log($user);
        $user->username=$request::get('username');
        $user->fullname=$request::get('fullname');
        $user->email=$request::get('email');
        $user->save();
    }
}
