@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Create Booking</title>
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
<h2>creat Booking</h2>
<form method="POST" action="{{ route('store-Booking') }}">
    @csrf

    <div class="form-group">
        <label for="ticket_id">ticket id</label>
        <select name="ticket_id" id="ticket_id" class="select2">
            @foreach($tickets as $ticket)
                <option value="{{ $ticket->id }}">{{ $ticket->date_s}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="customer_id">customer name</label>
        <select name="customer_id" id="customer_id" class="select2">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="hotel_id">hotel name</label>
        <select name="hotel_id" id="hotel_id" class="select2">
            @foreach($hotels as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="book_date"> book date</label>
        <input type="date" name="book_date" id="book_date" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary"> Add Book</button>
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