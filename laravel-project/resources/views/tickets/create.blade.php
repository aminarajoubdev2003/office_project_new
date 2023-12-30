
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
<h1>Add Ticket</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('tickets.store') }}" method="POST">
    @csrf
    <div>
        <label for="customer_id">Customer:</label>
        <select name="customer_id" id="customer_id">
         
            @foreach ($customers as $customer)
            <option value="{{ $customer->id }}" >
                {{ $customer->name }}
            </option>
        @endforeach
        </select>
    </div>
    <div>
        <label for="company_id">Company:</label>
        <select name="company_id" id="company_id" >
        @foreach ($companies as $company)
            <option value="{{ $company->id }}"  >
                {{ $company->address }}
            </option>
        @endforeach
        
        </select>
    </div>
    <div>
        <label for="city_id">City:</label>
        <select name="city_id" id="city_id">
            @foreach($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="date_s">From the date: </label>
        <input type="date" name="date_s" id="date_s">
    </div>
    <div>
        <label for="date_e">To date:</label>
        <input type="date" name="date_e" id="date_e">
    </div>
    <button type="submit">Add</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop