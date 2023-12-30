<!DOCTYPE html>
<html>
<head>
    <title>Create Cities</title>
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
<h2>Insert City</h2>
        <form method="POST" action="{{ route('create_city') }}">
            @csrf
            <div class="form-group">
                <label for="name">City Name:<label>
                <br>
                <input type="text" id="name" name="name" required>
               
        
   
            </div>
            <div class="form-group">
                <label for="country">Country Name:</label>
                <br>
                <input type="text" id="country" name="country" required>
                
            </div>
             
            <button type="submit">insert</button>
        </form>
</body>
</html>