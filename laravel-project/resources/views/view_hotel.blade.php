@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>HOTEL</title>
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
    <h1>HOTEL</h1>

 
   
        <table>
            <tr>
                <th>Name</th>
                <th>city</th>


            </tr>
            
            @foreach ($hotels as $hotel)             
               <tr>
                    <td>{{$hotel->name}}</td>
                    <td>{{$hotel->city->name}}</td>


                    <td>
                        <a class="edit-link" href="{{route('edithot',$hotel->id)}}">Edit</a>
                        <a class="delete-link" href="{{route('delethotel',$hotel->id)}}">Delete</a>
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