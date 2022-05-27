<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductUser;
use App\Models\User;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Show Producte Informations
    public function products()
    {
        $users= User::all();
        $products = Product::with('users')->get();
        return view('dashboard.product.products', compact('products','users'));
    }

    //Add Products
    public function createproduct(Request $request)
    {
        $create = new Product;
        $create->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'images/products';
            $file->move($path, $filename);
            $create->image = $filename;
        }
        $create->description = $request->description;
        $create->save();
        $users = $request->user;
        foreach($users as $user){
            $data= [
                'user_id'=> $user,
                'product_id'=> $create->id
            ];
        ProductUser::create($data);
        }
        return redirect('/products');
    }

    //Edit Products Information 
    public function editproduct(Request $request,$id)
    {
        $create = Product::find($id);
        $create->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'images/products';
            $file->move($path, $filename);
            $create->image = $filename;
        }
        $create->description = $request->description;
        $create->save();
        $user_product= ProductUser::where('product_id',$id)->delete();
        $users = $request->user;
        foreach($users as $user){
            $data= [
                'user_id'=> $user,
                'product_id'=> $create->id
            ];
        ProductUser::create($data);
        }
        return redirect('/products');
    }
    
    //Delete Information Products
    public function deleteproduct($id)
    {
        $delete = Product::find($id)->delete();
        return redirect('/products');
    }
}
