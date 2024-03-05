<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Order lists</h1>

    <div>
        <h2>Order for order-id: {{ $order->id }}</h2>
        <p>address: {{ $order->address }}</p>
        <p>status: {{ $order->status }}</p>
        <a href="">show order detail</a>
    </div>
</li>

    <h3>Your order item lists: </h3>
    @foreach ($order->orderItems as $item)
    @php
    $subtotal=$item->quantity * $item->product->price;    
    @endphp
    <li>product name: {{ $item->product->name }} product price:{{ $item->product->price }} quantity bought:{{ $item->quantity }} subtotal:{{ $subtotal }}</li>
    @endforeach

    

           
   
    
</body>
</html>