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

    <ol>
        @foreach ($orders as $order)
        <li>
            <div>
                <h2>Order for order-id: {{ $order->id }}</h2>
                <p>address: {{ $order->address }}</p>
                <p>status: {{ $order->status }}</p>
                <a href="{{ route('order.show',$order->id) }}">show order detail</a>
            </div>
        </li>
           
        @endforeach
    </ol>
   

    
</body>
</html>