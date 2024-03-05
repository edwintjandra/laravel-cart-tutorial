<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (Session::has('failed'))
    <h1 style="color:red">{{ Session::get('failed') }}</h1>
    @endif
    <h1>{{ $product->name }}</h1>
    <p>price: {{ $product->price }}</p>
    <p>description: {{ $product->description }} </p>

    <p> <strong> add item to carts: </strong> </p>
    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        quantity:
        <input type="number" name="quantity">

        <button>submit</button>
    </form>
    
</body>
</html>