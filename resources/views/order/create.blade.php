<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        Input your address:
        <input type="text" name="address">

        <button>submit</button>
    </form>
    
</body>
</html>