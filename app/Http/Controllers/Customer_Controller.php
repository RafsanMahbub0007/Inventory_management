<?php

namespace App\Http\Controllers;

use App\Models\customer;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class Customer_Controller extends Controller
{
    function customer_list()
    {
        $customers = customer::all();
        return view('backend.layout.customer.list',compact('customers'));
    }
    function customer_add(Request $request)
    {
         $request->validate([
        'cus_name'=>'required',
        'cus_phone'=>'required',
        'cus_address'=>'required',
        'cus_n1_image'=>'required',
        'cus_n2_image'=>'required',
        'cus_image'=>'required',
   ],[
    'cus_name.required' => 'Customer name field is required.',
    'cus_phone.required' => 'Customer phone field is required.',
    'cus_address.required' => 'Customer address field is required.',
    'cus_n1_image.required' => 'Customer NID image field is required.',
    'cus_n2_image.required' => 'Customer NID image name field is required.',
    'cus_image.required' => 'Customer image field is required.',
   ]);
   $customer_image ='';
        if ($request->hasFile('cus_image')) {
            $file = $request->file('cus_image');
            $destinationPath = 'uploads/customers/';
            $customer_image =  "customers-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $customer_image);
        }
        $customer_n1_image ='';
        if ($request->hasFile('cus_n1_image')) {
            $file = $request->file('cus_n1_image');
            $destinationPath = 'uploads/customers/NID_FRONT/';
            $customer_n1_image =  "customers-1" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $customer_n1_image);
        }
        $customer_n2_image ='';
        if ($request->hasFile('cus_n2_image')) {
            $file = $request->file('cus_n2_image');
            $destinationPath = 'uploads/customers/NID_BACK/';
            $customer_n2_image =  "customers-2" . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $customer_n2_image);
        }
        customer::updateOrCreate([
            'cus_name'=>$request->cus_name,
            'cus_phone'=>$request->cus_phone,
            'cus_image'=>$customer_image,
            'cus_n1_image'=>$customer_n1_image,
            'cus_n2_image'=>$customer_n2_image,
            'cus_address'=>$request->cus_address
        ]);
        return back()->with('success', 'Customer Added successfully.');
    }
}
