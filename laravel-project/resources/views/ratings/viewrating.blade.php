<!DOCTYPE html>
<html>
<head>
    <title>Rating</title>
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
    <h1>Rating</h1>

 
   
        <table>
            <tr>
                <th>Hotel</th>
                <th>Customer</th>
                <th>Rate</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
    
                <tr>
                    <td>{{ $rating->hotel->name }}</td>
                    <td>{{ $rating->customer->name }}</td>
                    <td>{{ $rating->rate }}</td>
                    <td>{{ $rating->comment }}</td>
                    <td>
                        <a class="edit-link" href="{{ route('edit_rating', $rating->id) }} ">Edit</a>
                        <a class="delete-link" href=" {{ route('delete_rating', $rating->id) }} ">Delete</a>
                    </td>
                </tr>
           
        </table>
  
</body>
</html>