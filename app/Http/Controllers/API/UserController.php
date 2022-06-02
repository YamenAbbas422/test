<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user($id)
    {
        $user = User::find($id);
        if($user != null){
            return response()->json([
                'message'=>'The Information User Is:',
                'user'=>$user
            ]);
        }else{
            return response()->json([
                'message'=>'User is not found',
            ],400);
        }
       
    }
    public function update(Request $request,$id)
    {
        $updateuser=User::where('id',$id)->first();
        if($updateuser != null){
        if($updateuser->email != $request->email){
            $simuler_email =User::where('email', $request->email)->get();
            if (count($simuler_email)>0){
                return response()->json(['message'=> 'email has taken']);
            }
        }
        $updateuser->fname=$request->fname;
        $updateuser->lname=$request->lname;
        $updateuser->email=$request->email;
        $updateuser->password=bcrypt($request->password);
        $updateuser->mobile=$request->mobile;
        $updateuser->save();
        return response()->json([
            'message'=> 'Update infomation is Done',
            'updateuser'=> $updateuser
        ]);
    }else{
        return response()->json([
            'message'=>'User is not found',
        ],400);
    }
    }
    public function changepassword(Request $request,$id)
    {
        $changepassword= User::find($id);
        if(Hash::check($request->old_password ,$changepassword->password)){
        }else{
            return response()->json([
                'message'=> 'Password does not match',
            ]);
        }
        $changepassword->password=Hash::make($request->password);
        $changepassword->save();
        return response()->json([
            'message'=> 'Updated Successfully',
        ]);
    }
    public function forgot()
    {
        $credentials = request()->validate(['email' => 'required|email']);
        $user = User::where('email', $credentials['email'])->first();
        if ($user == null) {
            return response()->json('Eamil is not register.');
        }
        Password::sendResetLink($credentials);
        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }
}
