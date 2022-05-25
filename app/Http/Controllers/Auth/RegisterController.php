<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registerto(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'fname' => 'string|required',
            'lname' => 'string|required',
            'email' => 'email|required|unique:users',
            'password' => 'string | min:6|confirmed',
            'mobile' => 'string|required|unique:users',
        ]);
        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile' =>$request->mobile,
        ]);
        
        $token = Str::random(64);
        $email =  $user->email;
        Mail::send('emails.emailVerificationEmail', ['token' => $token], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Email Verification Mail');
        });
        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);
        return view('auth.register');
    }
}
