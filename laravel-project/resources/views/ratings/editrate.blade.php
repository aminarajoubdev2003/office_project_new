<!DOCTYPE html>
<html>
<head>
    <title>Edit Rating</title>
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
        <h2>Edit Rating</h2>
        <form method="post" action="{{ route('update_rating', $rating->id) }} ">
        @csrf
        <div>
            <label for="hotel_id">Hotel</label>
            <select name="hotel_id" id="hotel_id">
                @foreach ( $hotels as $hotel )
                <option value="{{ $rating->hotel_id }}" >{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>
    <br>
    <br>
        <div>
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id">
                @foreach ( $customers as $customer )
                <option value="{{ $rating->customer_id  }}" >{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
    
    <br>
    <br>
    <label for="name">rate</label>
    <br>
    <input type="text" name="rate" value="{{ $rating->rate }} "/>
    <br>
    <label for="name">comment</label>
    <br>
    <input type="text" name="comment" value="{{ $rating->comment }} "/>

     
    <input type ="submit" value="save">
</form>
    </div>
</body>
</html>