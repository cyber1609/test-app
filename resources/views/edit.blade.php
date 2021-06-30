<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
<form action="/{{$product->id}}" method="post">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <label for="name">Product name:</label><br>
    <input type="text" id="name" name="name" value="{{old('name', $product->name)}}"><br>
    <label for="quantity">Quantity in stock:</label><br>
    <input type="number" id="quantity" name="quantity" value="{{old('quantity', $product->quantity)}}"><br>
    <label for="price">Price per item:</label><br>
    <input type="number" id="price" name="price" step="0.01" value="{{old('price', $product->price)}}"><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
