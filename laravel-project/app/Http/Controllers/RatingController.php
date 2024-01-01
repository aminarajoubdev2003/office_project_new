<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Hotel;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Rating::with('hotel','customer')->get();
        return view('ratings.viewratings', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::all();
        $customers = Customer::all();
        return view('ratings.createrate',compact('hotels', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( $request->isMethod('post') ) {
            $validate = Validator::make($request->all(),[
                'hotel_id' =>'required|string|exists:hotels,id',
                'customer_id' =>'required|string|exists:customers,id',
                'rate' =>'required|integer|min:10|max:100',
                'comment' =>'required|string'
            ]);

            if($validate->fails()) {
                dd($validate->errors());
            }else{
                $data = [
                    'hotel_id' => $request->hotel_id,
                    'customer_id'=> $request->customer_id,
                    'rate' => $request->rate,
                    'comment' => $request->comment
                ];
                $rateing = Rating::create($data);
            }
        }else{
            return view('ratings.createrate');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $rating = Rating::find($id);
        return view('ratings.viewrating',['rating' => $rating]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rating = Rating::find($id);
        $hotels = Hotel::all();
        $customers = Customer::all();
        return view('ratings.editrate', compact('rating','hotels','customers'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        if( $request->isMethod('post') ) {
        $rating = Rating::find($id);
        
            $validate = Validator::make($request->all(),[
                    'hotel_id' =>'required|string|exists:hotels,id',
                    'customer_id' =>'required|string|exists:customers,id',
                    'rate' =>'required|integer|min:10|max:100',
                    'comment' =>'required|string'
                ]);
    
                if($validate->fails()) {
                    dd($validate->errors());
                }else{
                    $rating->update($request->all()); 

            
                }
            }else{
            return view('ratings.editrate');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = Rating::find($id);
        if( $rating->delete()) {
            echo "rating is deletet sucsesfully";
        }
    }



    public function get_high_hotel() {
        $ratings = Rating::all();
        $rate = array();
        $rate = $ratings;
        $max = 0;
        for( $i=0; $i<count($rate); $i++) {
            if( $rate[$i]['rate'] > $max)
            $max = $rate[$i]['rate'];
        }
        $max_rate = $max;
        $ratings = Rating ::where('rate', $max_rate)->get();
        return view('ratings.viewhighratings', compact('ratings'));

    }
}
