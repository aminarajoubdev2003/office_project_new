@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edi Booking</title>
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
        <h2>Edit Booking</h2>
        <form method="post" action="{{ route('update-booking',['id'=>$booking->id]) }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="ticket_id">ticket date</label>
        <select name="ticket_id" id="ticket_id" class="select2">
            @foreach($tickets as $ticket)
                <option value="{{ $ticket->id }}" {{ $ticket->id == $booking->ticket_id ? 'selected' : '' }}>{{ $ticket->date_s }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="customer_id">custumer name</label>
        <select name="customer_id" id="customer_id" class="select2">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $customer->id == $booking->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="hotel_id">hotel name</label>
        <select name="hotel_id" id="hotel_id" class="select2">
            @foreach($hotels as $hotel)
                <option value="{{ $hotel->id }}" {{ $hotel->id == $booking->hotel_id ? 'selected' : '' }}>{{ $hotel->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="book_date">book date</label>
        <input type="date" name="book_date" id="book_date" class="form-control" value="{{ $booking->book_date }}">
    </div>

    <button type="submit" class="btn btn-primary">update booking</button>
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