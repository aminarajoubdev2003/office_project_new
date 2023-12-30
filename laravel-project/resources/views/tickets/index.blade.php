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
    
<h1>Tickets</h1>

 

<table>
    <thead>
        <tr>
            <th>Customer</th>
            <th>Company</th>
            <th>City</th>
            <th>From the date</th>
            <th>To date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->customer->name }}</td>
                <td>{{ $ticket->company->address }}</td>
                <td>{{ $ticket->city->name }}</td>
                <td>{{ $ticket->date_s }}</td>
                <td>{{ $ticket->date_e }}</td>
                <td>
                 
                    <a class="delete-link" href="{{ route('tickets.destroy', $ticket->id) }}">Delete</a>
                    <a class="edit-link" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
                    <a href="{{ route('tickets.show', $ticket->id) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    
</table>
<a href="{{ route('tickets.create') }}">Add Ticket</a>
<br>
<a href="{{ route('search.index') }}"> search</a>
</body>
</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop