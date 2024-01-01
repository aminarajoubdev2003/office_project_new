@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit Hotel</title>
    <style>
        
        body {
 
 background-color: #bbbb;
 background-image: url("tt.jpg");
 background-size: cover;
         }
        .edit-form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .edit-form label {
            font-weight: bold;
        }

        .edit-form input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .edit-form button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="edit-form">
        <h2>Edit Hotel</h2>
        <form  method="POST" action="" >
    {{ csrf_field() }}
    <label for="name">name</label>
    <br>
    
    <input type="text" name="name" value="{{$hotels->name}} "/>
      
    
    <br>
    <select name='city_id' >
                @foreach($cities as $city)
                <option value='$hotels->city_id'>{{$city->name}}</option>
                @endforeach       
               </select>







    
    <br>
    <br>


     
    <input type ="submit" value="save">
</form>
    </div>
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop