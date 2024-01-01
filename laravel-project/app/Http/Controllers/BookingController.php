<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Booking;
use  App\Models\Ticket;
use  App\Models\Hotel;
use  App\Models\Customer;
use Illuminate\Support\Facades\Validator;



class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ticket = Ticket::all();
        $Hotel = Hotel::all();
        $Customer = Customer::all();
        $Booking1 = Booking::all();
        return view('booking.index',compact('Ticket','Hotel','Customer','Booking1'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tickets = Ticket::all();
        $hotels = Hotel::all();
        $customers = Customer::all();
        return view('booking.create', compact('customers', 'hotels', 'tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=Validator::make($request->all(),[
            'ticket_id' => 'required',
            'customer_id' => 'required',
            'hotel_id' => 'required',
            'book_date' => 'required',
        ]);
        if ($validatedData->fails()) {
            dd($validatedData->errors());
        }
        $Booking2=Booking::create($validatedData->validated());
        $Booking1=Booking::all();
        $tickets = Ticket::all();
        $hotels = Hotel::all();
        $customers = Customer::all();
        return view('booking.index', compact('Booking1','customers', 'hotels', 'tickets'));
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $customers = Customer::all();
        $hotels = Hotel::all();
        $tickets = Ticket::all();

        return view('booking.edit', compact('booking', 'customers', 'hotels', 'tickets'));
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
        $validatedData=Validator::make($request->all(),[
            'ticket_id' => 'required',
            'customer_id' => 'required',
            'hotel_id' => 'required',
            'book_date' => 'required',
        ]);

        $booking = Booking::findOrFail($id);
        if ($validatedData->fails()) {
            dd($validatedData->errors());
        }
        
        $booking->update($validatedData->validated());
        $Booking1=Booking::all();
        return view('booking.index', compact('Booking1'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        $Booking1=Booking::all();
        return view('booking.index', compact('Booking1'));
    }
}
