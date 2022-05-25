<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    //  public function redirectTo()
    //  {
    //      if (Auth::user() -> user_type == 'vendor')
    //      {
    //         return 'dashboard';
    //      }
    //      if (Auth::user()-> user_type == 'users')
    //      {
    //          return 'dashboard';
    //      }
    //  }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('guest')->except('logout');
    //     $this->middleware('auth');

    // }

    public function loginto(Request $request)
    {
        // return $request;
        $user = User::where("email", $request->email)->first();
        $password = $user->password;
        if ($password = $request->password) {
            return view('dashboard.index');
        } else {
            return view('auth.login');
        }
    }
}
