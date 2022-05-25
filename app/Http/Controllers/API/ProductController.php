<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addproduct(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'images/products';
            $file->move($path, $filename);
            $product->image = $filename;
        }
        $product->description = $request->description;
        $product->save();
        return response()->json([
            'message' => 'The Information Product Is:',
            'user' => $product
        ]);
    }
    public function editproduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'images/products';
            $file->move($path, $filename);
            $product->image = $filename;
        }
        $product->description = $request->description;
        $product->save();
        return response()->json([
            'message' => 'Edit infomation is Done',
            'user' => $product
        ]);
    }
    public function deleteproduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'message' => 'Delete Product is Done'
        ]);
    }
    public function getproduct(Request $request)
    {
        $page_size = $request->page_size ?? 5;
        $product = Product::query()->paginate($page_size);
        return response()->json([
            'message' => 'Products:',
            'product' => $product
        ]);
    }
    public function userProduct($user_id)
    {
        $products = ProductUser::where('user_id', $user_id)->get();
        $pro = [];
        foreach ($products as $product) {
            $product = Product::where('id', $product->product_id)->first();
            array_push($pro, $product);
        }
        return response()->json([
            'message' => 'Products:',
            'product' => $pro
        ]);
    }
}
