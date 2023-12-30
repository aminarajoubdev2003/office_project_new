<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
 
 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required|min:8',
        ],[
           
            'email.unique' => ' Email already exists',
          
            
        ]);
        
         
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
     
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('users.index')->with('success', 'User added successfully.');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $user=User::find($id);
        
        return view('users.edit-user',['user'=>$user]);
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
         $user=User::find($id);
         $validatedData = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' =>'required|email|unique:users,email,' . $id,
            'password' => 'required|min:8',
        ],[
           
            'email.unique' => ' Email already exists',
          
            
        ]);
        
         
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
    
      
    
        
       
        return redirect()->route('users.index');
    
       

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { $user=User::find($id);
        $user->delete();
        return redirect()->route('users.index');
       
   
  

  
 
    }

   /*  public function createverify()
    {
       
        $number1 = rand(1, 10);
        $number2 = rand(1, 10);
 
        $operators = ['+', '-', '*', '/'];
        $operator = $operators[array_rand($operators)];

        
        $expectedAnswer = 0;
        switch ($operator) {
            case '+':
                $expectedAnswer = $number1 + $number2;
                break;
            case '-':
                $expectedAnswer = $number1 - $number2;
                break;
            case '*':
                $expectedAnswer = $number1 * $number2;
                break;
            case '/':
                $expectedAnswer = $number1 / $number2;
                break;
        }

        return view('auth.varifytheuser', compact('number1', 'number2', 'operator', 'expectedAnswer'));
    } */
/*     public function storeverify(Request $request)
    {
        $answer = $request->input('answer');
        $expectedAnswer = $request->input('expected_answer');

        if ($answer == $expectedAnswer) {
            // قم بتنفيذ عملية إنشاء الحساب في Laravel هنا
            return view('account-created');
        } else {
            return redirect()->back()->with('error', 'الإجابة خاطئة! يرجى المحاولة مرة أخرى.');
        }
    } */

}
