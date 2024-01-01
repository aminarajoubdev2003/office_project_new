
@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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
        <h2>Edit City</h2>
        <form method="post" action="{{ route('update_city',['id' => $city->id]) }} ">
    {{ csrf_field() }}
    <label for="name">name</label>
    <br>
    <input type="text" name="name" value="{{ $city->name }} "/>
     
    <label for="name">country</label>
    <br>
    <input type="text" name="country" value="{{ $city->country }} "/>
    
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