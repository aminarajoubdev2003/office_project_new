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
<h1>Ticket Details</h1>

<p><strong>Customer:</strong> {{ $ticket->customer->name }}</p>
<p><strong>Company:</strong> {{ $ticket->company->address }}</p>
<p><strong>City:</strong> {{ $ticket->city->name }}</p>
<p><strong>From the date:</strong> {{ $ticket->date_s }}</p>
<p><strong>To date:</strong> {{ $ticket->date_e }}</p>

<a class="delete-link" href="{{ route('tickets.destroy', $ticket->id) }}">Delete</a>
  <a class="edit-link" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
 
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