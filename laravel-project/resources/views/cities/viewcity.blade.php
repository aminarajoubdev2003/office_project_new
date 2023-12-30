<!DOCTYPE html>
<html>
<head>
    <title>City</title>
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
    <h1>City</h1>

 
   
        <table>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
                <tr>
                    <td>{{  $city->name }}</td>
                    <td>{{  $city->country }}</td>
                    <td>
                        <a class="edit-link" href=" {{ route('edit_city', $city->id) }} ">Edit</a>
                        <a class="delete-link" href=" {{ route('delete_city', $city->id) }} ">Delete</a>
                    </td>
                </tr>
        </table>
  
</body>
</html>