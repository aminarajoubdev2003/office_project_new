<!DOCTYPE html>
<html>
<head>
    <title>verify</title>
</head>
<body>
    <h1> verify </h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <p>ما هو ناتج {{ $number1 }} {{ $operator }} {{ $number2 }}؟</p>
        <input type="hidden" name="expected_answer" value="{{ $expectedAnswer }}">
        <input type="text" name="answer">
        <button type="submit">send</button>
    </form>
</body>
</html>