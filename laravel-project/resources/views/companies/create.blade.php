@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Create Company</title>
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
<h2>creat company</h2>
        <form method="POST" action="{{ route('store-company') }}">
            @csrf
            <div class="form-group">
                <label for="title">title</label>
                <br>
                <input type="title" id="title" name="title" required>
               
        
   
            </div>
            <div class="form-group">
                <label for="address">address</label>
                <br>
                <input type="address" id="address" name="address" required>
                
            </div>
            <div class="form-group">
                <label for="phone">phone</label>
                <br>
                <input type="phone" id="phone" name="phone" required>
               
         
            </div>
             
            <button type="submit">create company</button>
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