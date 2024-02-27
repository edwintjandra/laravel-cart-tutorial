<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cart Lists</h1>
    
    @foreach ($carts as $cart)
    @php
    $subtotal=$cart->quantity * $cart->product->price;    
    @endphp
        <li>product name: {{ $cart->product->name }} product price:{{ $cart->product->price }} quantity bought:{{ $cart->quantity }} subtotal:{{ $subtotal }}</li>
    @endforeach

    <a href="{{ route('order.create') }}">checkout</a>
</body>
</html>