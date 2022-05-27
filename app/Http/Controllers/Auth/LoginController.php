<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\Console\Input\Input;

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

    // use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function loginto(Request $request)
    {
        $login = request()->input('email');

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        $val = request()->merge([$field => $login]);

        if (Auth::attempt(array($field => request()->input('email'), 'password' => request()->input('password')))){
            return view('dashboard.index');
        }else{
                return view('auth.login');
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/showlogin');
      }
}
