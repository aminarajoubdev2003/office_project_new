
@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>companies</title>
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
    <h1>companies</h1>

 
    
        <table>
            <tr>
                <th>title</th>
                <th>address</th>
                <th>phone</th>
            </tr>
           
            @foreach($company as $company )
                <tr>
                    <td>{{ $company->title }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->phone }}</td>
                    <td>
                        <a class="edit-link" href=" {{  route('edit-company',['id'=>$company->id]) }}">Edit</a>
                        <a class="delete-link" href="  {{  route('destroy-company',['id'=>$company->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
      
   
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop