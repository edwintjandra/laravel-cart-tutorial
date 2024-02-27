<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1>Create new product</h1>

    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        name
        <input type="text" name="name">
        <br>
        price
        <input type="number" name="price">
        <br>
        description:
        <textarea name="description" cols="30" rows="10"></textarea>
        <button>submit</button>
    </form>
    
</body>
</html>