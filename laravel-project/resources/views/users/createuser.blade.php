@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
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
<h2>Create an account</h2>
        <form method="POST" action="/usersCreate">
            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <br>
                <input type="text" id="name" name="name" required>
                @error('name')
        <span>{{ $message }}</span>
    @enderror
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <br>
                <input type="email" id="email" name="email" required>
                @error('email')
        <span>{{ $message }}</span>
    @enderror
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <br>
                <input type="password" id="password" name="password" required>
                @error('password')
        <span>{{ $message }}</span>
    @enderror
            </div>
             
            <button type="submit">create</button>
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
