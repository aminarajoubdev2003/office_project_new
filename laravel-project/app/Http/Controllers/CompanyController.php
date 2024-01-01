<?php

namespace App\Http\Controllers;
use  App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = Company::all();
        return view('companies.index', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->isMethod('POST'))
        {
         
         $validatedData=Validator::make($request->all(),[
         'title' =>'required|string|max:20',
         'address' =>'required|string|max:30',
         'phone' =>'required|numeric|digits:10',
         ]);
         
        if ($validatedData->fails()) {
            dd($validatedData->errors());
        }
        $company1= Company::create($validatedData->validated());
        $company = Company::all();
        return view('companies.index', ['company' => $company]);
       // return view('companies.index')->with('company' , $company);
       
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
        //
        $company = Company::find($id);
        return view('companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = Company::findOrFail($id);
        return view('companies.edit', ['company' => $company]);
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
        //
        $company1=Company::find($id);
        if ($request->isMethod('post')){
                $validatedData=Validator::make($request->all(),[
                    'title' =>'required|string|max:20',
                    'address' =>'required|string|max:30',
                    'phone' =>'required|numeric|digits:10',
                    ]);
                    $company1->update($validatedData->validated());
                    echo "every thing good update";
                    $company = Company::all();
                    return view('companies.index',['company'=>$company]);
                 
                    
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
        //
        
        $company1 = Company::findOrFail($id);
        $company1->delete();
        $company = Company::all();
        return view('companies.index',['company'=>$company])->with('success', 'Company deleted successfully.');
    }
}
