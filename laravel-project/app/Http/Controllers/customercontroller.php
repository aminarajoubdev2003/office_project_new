<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;


class customercontroller extends Controller
{
    public function store(REQUEST $request)
    {
        
        $mass=['name'=>'please enter a letter only ',
              'mobile'=>'please enter a numbers only ',
              'email'=>'email is worng'];
        $valedate=Validator::make($request->all(),[
           'name' =>'required|string',
           'mobile'=>'required|integer',
           'email'=>'required|email',
           

        ],$mass);
        if($valedate->fails())
        dd($valedate->errors());
    
        $createcustomer=Customer::create([
            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'gender'=>$request->gender,
            'email'=>$request->email]);
            return redirect()->back();
            
            
            
    }
    
    public function create()
    {
        return view('createcustomer');
        
        
    }
    
    public function index()
    {
        $customers=Customer::all();
        return view('viewcustomer',compact('customers'));
    }

    public function edat($id)
    {
        $customers=Customer::find($id);
        return view('editcustomer',compact('customers'));
    }

    public function update(REQUEST $request,$id)
    {
        $mass=['name'=>'please enter a letter only ',
              'mobile'=>'please enter a numbers only ',
              'email'=>'email is worng'];
        $valedate=Validator::make($request->all(),[
           'name' =>'required|string',
           'mobile'=>'required|integer',
           'email'=>'required|email',
           

        ],$mass);
        if($valedate->fails())
        


        $customer=Customer::find($id);
        $customer->name=$request->name;
        $customer->mobile=$request->mobile;
        $customer->gender=$request->gender;
        $customer->email=$request->email;
        $input=$request->all();
        $customer->update($input);
        return redirect()->back();
             
    }

    public function destore($id)
    {
        $customer=Customer::find($id);
        $customer->delete();
        return redirect()->back();

    }

    public function searsh($name)
    {
        $customer=Customer::where('name',$name)->get();
        return view('viewcustomer',compact('customer'));

    }





        
}
