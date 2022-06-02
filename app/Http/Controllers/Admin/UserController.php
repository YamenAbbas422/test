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

    public function __construct()
    {
        $this->middleware('auth');
    }
    //Get Users Informations
    public function index()
    {
        return view('dashboard.index');
    }
    public function users()
    {
        $users = User::with('products')->get();
        // return $users;
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
            'password' => 'string |required| min:6 | confirmed'
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
            'password' => 'string |required| min:6 | confirmed'
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
