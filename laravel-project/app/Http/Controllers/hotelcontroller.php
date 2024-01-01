<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\City;
use Illuminate\Support\Facades\Validator;



use Illuminate\Http\Request;

class hotelcontroller extends Controller
{
  public function create()
  {
  
    $hotels=Hotel::all();
    $cities=City::all();
    return view('createhotel',compact('hotels','cities'));
  }
  public function store(REQUEST $request)
  {


      $valedate=Validator::make($request->all(),[
      'name' =>'required|string',
      'city_id'=>'required|string|exists:cities,id']);
      if($valedate->fails())
      
      dd($valedate->errors());
      
       $create_hotel=Hotel::create([
      'name'=>$request->name,
      'city_id'=>$request->city_id
       ]);
       return redirect()->back();
      
      
    }

  public function index()
  {
      $hotels=Hotel::with('city')->get();
      
      return view('view_hotel', compact('hotels'));
  }

  public function destore($id)
  {
      $hotel=Hotel::find($id);
      $hotel->delete();
      return redirect()->back();

  }

  public function edit($id)
  {
    $hotels=Hotel::find($id);
    $cities=City::all();
    return view('edithotel',compact('hotels','cities'));
  }
  /*public function update(REQUEST $request,$id)
  {
$valedate=Validator::make($request->all(),[
 'name' =>'required|string',
 'city_id'=>'required|string|exists:cities,id'
 

]);
if($valedate->fails())
dd($valedate->errors());

    $hotel=Hotel::find($id);
    $hotel->name=$request->name;
    $hotel->city_id=$request->city_id;
    $input=$request->all();
    $hotel->update($input);
    return redirect()->back();

  }*/
}
