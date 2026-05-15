<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a Product</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        @method('POST')
        <div>
            <label> Product Name </label>
            <input type="text" name="name" value="" placeholder="Name" />
        </div>
        <div>
            <label> Product Description </label>
            <input type="text" name="description" value="" placeholder="Description" />
        </div>
        <div>
            <label> Product Price </label>
            <input type="text" name="price" value="" placeholder="Price" />
        </div>
        <div>
            <label> Product Quantity </label>
            <input type="text" name="qty" value="" placeholder="Quantity" />
        </div>
        <div>
            <input type="submit" value="Create Product" />
        </div>
    </form>
</body>
</html>
