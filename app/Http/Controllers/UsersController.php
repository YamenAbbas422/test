<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{


    public function resetPassword(Request $request){
        
        $data = request()->validate([
            'email' => 'min:2',
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::where('email',$request->email)->first();
        
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect ('/showlogin')->with('message','Change Password Is Done.');
    }
    public function showLoginForm() {
        return view('auth.login');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        if ($verifyUser != null) {
            $user = $verifyUser->user_id;
            $user = User::find($verifyUser->user_id);
            $user->email_verified_at = now();
            $user->is_email_verified =  1;
            $user->save();
        } else {
            dd('Sorry your email cannot be identified.');
        }
        return redirect('/showlogin');
    }

}
