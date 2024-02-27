<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Product list</h1>
    <a href="{{ route('product.create') }}">create product</a>
    @foreach ($products as $product)
        <li>{{ $product->name }}  <a href="{{ route('product.show',$product->slug) }}">show more</a> </li>
    @endforeach
    
</body>
</html>