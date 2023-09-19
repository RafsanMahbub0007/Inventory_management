<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class Product_Controller extends Controller
{
    function product_list()
    {
        $products = product::all();
        return view('backend.layout.product.list',compact('products'));
    }
    function product_add(Request $request) {
        $request->validate([
            'p_name'=>'required',
            'p_code'=>'required',
            'p_stock'=>'required',
            'p_image'=>'required|image|mimes:jpeg,png,jpg',
        ],[

            'p_name.required' => 'Product name field is required.',
            'p_code.required' => 'Product code field is required.',
            'p_stock.required' => 'Product stock field is required.',
            'p_image.required' => 'Product Photo field is required.',
            'p_image.image' => 'Product Photo field must be image type.',
            'p_image.mimes' => 'Product Photo file Type must be jpeg,png,jpg.',
        ]);
        // dd($request->all());
        // store photo
        $filename ='';
        if ($request->hasFile('p_image')) {
            $file = $request->file('p_image');
            $destinationPath = 'uploads/products/';
            $filename =  "products-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
        }
        product::create([
            'p_name'=>$request->p_name,
            'p_code'=>$request->p_code,
            'p_stock'=>$request->p_stock,
            'p_image'=> $filename
        ]);
        return back()->with('success', 'Product Added successfully.');
    }
}
