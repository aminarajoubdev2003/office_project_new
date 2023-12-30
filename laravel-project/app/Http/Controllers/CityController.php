<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cities = City::all();
        return view('cities.viewcities',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.createcity');
    
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
                'name' =>'required|string',
                'country' => 'required|string',
            ]);

            if($validate->fails()) {
                dd($validate->errors());
            }else{
                $data = [
                    'name' => $request->name,
                    'country' => $request->country,
                ];
                $city = City::create($data);
            }
        }else{
            return view('cities.createcity');
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
        $city = City::find($id);
        return view('cities.viewcity',['city' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('cities.editcity',['city' => $city]);
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
        $city = City::find($id);
        if( $request->isMethod('post') ) { 
            $validate = Validator::make($request->all(),[
                    'name' =>'required|string',
                    'country' =>'required|string'
                ]);
    
                if($validate->fails()) {
                    dd($validate->errors());
                }else{
                    $city->update($request->all());
            }
            }
            else{
            return view('cities.editcity');
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
        $city = City::find($id);
        if( $city->delete()) {
            echo "city is deletet sucsesfully";
        }
    }
}
