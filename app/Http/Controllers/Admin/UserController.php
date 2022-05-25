<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductUser;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    //Get Users Informations
    public function users()
    {
        $users = User::all();
        return view('dashboard.user.users', compact('users'));
    }

    //Add Users
    public function createuser(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'fname' => 'string|required',
            'lname' => 'string|required',
            'email' => 'email|required|unique:users',
            'mobile' => 'string|required',
            'password' => 'string | min:6'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('status', "Warning! Better check yourself, you're not looking too good.");
            return redirect()->back();
        }
        $createuser = new User;
        $createuser->fname = $request->fname;
        $createuser->lname = $request->lname;
        $createuser->email = $request->email;
        $createuser->mobile = $request->mobile;
        $createuser->password = bcrypt($request->password);
        $createuser->save();
        return redirect('/users');
    }

    // Edit inforamtion User
    public function edituser(Request $request, $id)
    {
        $validator = validator()->make($request->all(), [
            'fname' => 'string|required',
            'lname' => 'string|required',
            'email' => 'email|required|unique:users',
            'mobile' => 'string|required',
            'password' => 'string | min:6'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('status', "Warning! Better check yourself, you're not looking too good.");
            return redirect()->back();
        }
        $createuser = User::find($id);
        $createuser->fname = $request->fname;
        $createuser->lname = $request->lname;
        $createuser->email = $request->email;
        $createuser->mobile = $request->mobile;
        $createuser->password = bcrypt($request->password);
        $createuser->save();
        return redirect('/users');
    }

    //Delete User
    public function deleteuser($id)
    {
        $delete = User::find($id)->delete();
        return redirect('/users');
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
            return 'email is verified';
        } else {
            dd('Sorry your email cannot be identified.');
        }
        return redirect('/login');
    }

    //Show Products User
    public function showproduct($user_id)
    {
        $products = ProductUser::where('user_id', $user_id)->get();
        $items = [];
        foreach ($products as $product) {
            $product = Product::where('id', $product->product_id)->first();
            array_push($items, $product);
        }
        return view('dashboard.user-product.user-product', compact('items'));
    }
}
