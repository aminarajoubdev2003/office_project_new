<!DOCTYPE html>
<html>
<head>
    <title>Create Rating</title>
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
<h2>Rating Creata</h2>
        <form method="POST" action=" {{ route('create_rating') }}">
            @csrf
            <div>
            <label for="hotel_id">Hotel</label>
            <select name="hotel_id" id="hotel_id">
                @foreach ( $hotels as $hotel )
                <option value="{{ $hotel->id }}" >{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>
    <br>
    <br>
        <div>
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id">
                @foreach ( $customers as $customer )
                <option value="{{ $customer->id }}" >{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
    
    <br>
    <label for="name">rate</label>
    <br>
    <input type="text" name="rate" value=" "/>
    <br>
    <label for="name">comment</label>
    <br>
    <input type="text" name="comment" value=" "/>

             
            <button type="submit">insert</button>
        </form>
</body>
</html>