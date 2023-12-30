@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
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
        .create-link {
            background-color: #bbbbbb;
        }
    </style>
    </head>
<body>
<form action="{{ route('search.search') }}" method="POST">
    @csrf
    <div>
     <h3>   <label >Search by date:</label></h3>
       
    <label for="date_s">Departure Date:</label>
    <input type="date" name="date_s"  >

    <label for="date_e">Return Date:</label>
    <input type="date" name="date_e" >
    <div>
    <h3>   <label  >Search by company:</label></h3>
        <label for="company_id">Company:</label>
        <select name="company_id" id="company_id">
        @foreach ($companies as $company)
            <option value="{{ $company->id }}"  >
                {{ $company->address }}
            </option>
        @endforeach
        
        </select>
    </div>
    <button type="submit">Search</button>
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