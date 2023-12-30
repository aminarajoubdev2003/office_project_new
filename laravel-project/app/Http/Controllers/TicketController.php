<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Company;
use App\Models\City;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Validator;
class TicketController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('customer', 'company', 'city')->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $companies = Company::all();
        $cities = City::all();

        return view('tickets.create', compact('customers', 'companies', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'customer_id' => 'required|exists:customers,id',
            'company_id' => 'required|exists:companies,id',
            'city_id' => 'required|exists:cities,id',
            'date_s' => 'required|date|after_or_equal:today',
            'date_e' => 'required|date|after:date_s',
        ],[
           
            'date_e.after' => ' the to Date must be after the From the Date',
          'date_s.after_or_equal'=>'The From the date must be after or equal to today.',
            
        ]);
        $validator->after(function ($validator) use ($request) {
            $Dates = $request->input('date_s');
            $today = date('Y-m-d');
            
            if ($Dates < $today) {
                $validator->errors();
            }
        });
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
     
        $ticket = Ticket::create($request->all());
        return redirect()->route('tickets.show', $ticket->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $ticket = Ticket::findOrFail($id); 
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $customers = Customer::all();
        $companies = Company::all();
        $cities = City::all();

        return view('tickets.edit', compact('ticket', 'customers', 'companies', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(),[
            'customer_id' => 'required|exists:customers,id',
            'company_id' => 'required',
            'city_id' => 'required',
            'date_s' => 'required|date|after_or_equal:today',
            'date_e' => 'required|date|after:date_s',
        ],[
           
            'date_e.after' => ' the to Date must be after the From the Date',
          'date_s.after_or_equal'=>'The From the date must be after or equal to today.',
            
        ]);
        $validator->after(function ($validator) use ($request) {
            $Dates = $request->input('date_s');
            $today = date('Y-m-d');
            
            if ($Dates < $today) {
                $validator->errors();
            }
        });
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $ticket->update($request->all());
        return redirect()->route('tickets.show', $ticket->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
       
        $ticket->delete();
        return redirect()->route('tickets.index');
    }

    public function search()
    {
        $companies = Company::all();
        return view('tickets.search',compact( 'companies' ));
    }
    public function searchshow(Request $request)
    {
        $date_s = $request->input('date_s');
        $date_e = $request->input('date_e');
        $company_id = $request->input('company_id');

         $query = Ticket::query();

        if (!empty($date_s) && !empty($date_e)) {
            $query->whereDate('date_s', '>=', $date_s)
            ->whereDate('date_e', '<=', $date_e)
            ->get();
        }

  else  if (!empty($company_id)) {
         //   $company = Company::where('name', '=', $companyName)->first();
           // if ($company) {
                $query->where('company_id', '=', $company_id);
          //  }
        }

        $tickets = $query->get();

       
    return view('tickets.results',['tickets' => $tickets]);
   
       
    }
}
