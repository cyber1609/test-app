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

<form action="/" method="post">
    @csrf
    <label for="name">Product name:</label><br>
    <input type="text" id="name" name="name" value="{{old('name')}}"><br>
    <label for="quantity">Quantity in stock:</label><br>
    <input type="number" id="quantity" name="quantity" value="{{old('quantity')}}"><br>
    <label for="price">Price per item:</label><br>
    <input type="number" id="price" name="price" step="0.01" value="{{old('price')}}"><br>
    <input type="submit" value="Submit">
</form>

<table class="table">
    <thead>
    <tr>
        <th>Product name</th>
        <th>Quantity in stock</th>
        <th>Price per item</th>
        <th>Datetime submitted</th>
        <th>Total value number</th>
        <th>EDIT</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->submitted_at}}</td>
            <td>{{$product->total_price}}</td>
            <td><a href="/{{$product->id}}/edit">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <th>Total: {{$sum}}</th></tfoot>
</table>
</body>
</html>
