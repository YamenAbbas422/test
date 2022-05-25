<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
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
        return redirect ('/login')->with('message','Change Password Is Done.');
    }
    public function showLoginForm() {
        return view('auth.login');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
