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
    <h1>Admin</h1>

    <!-- Display users -->
   
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="edit-link" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <a class="delete-link" href="{{ route('users.destroy', $user->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a class="create-link" href="{{ route('users.create') }}">create user</a>
</body>
</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
