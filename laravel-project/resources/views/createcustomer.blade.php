@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
    <style>
      
        body {
 
 
            background-image: url("tt.jpg");
            background-size: cover;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .edit-link,
        .delete-link {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 3px;
        }

        .delete-link {
            background-color: #f44336;
        }
    </style>
</head>
<body>
<h2> add customer</h2>
        <form  action="{{route('addcustomer')}}" method="POST">
            @csrf

               
        
   
            </div>
            <div class="form-group">
                <label for="name">Name :</label>
                <br>
                <input type="text" id="name" name="name" required>
                
            </div>
            <div class="form-group">
                <label for="mobile">Mobile :</label>
                <br>
                <input type="text" id="mobile" name="mobile" required>
               
         
            </div>

            <div class="form-group">
                <label for="gender">Gender :</label>
                <br>
               <select name='gender'>
                <option>male</option>
                <option>famile</option>
               </select>
               
         
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <br>
                <input type="email" id="email" name="email" required>
               
         
            </div>
             
            <button type="submit"> Add Customer</button>
        </form>
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop