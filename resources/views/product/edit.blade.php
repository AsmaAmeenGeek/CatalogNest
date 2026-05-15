<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Product</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form action="{{ route('product.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label> Product Name </label>
        <input type="text" name="name" value="{{ $product->name }}" />
    </div>

    <div>
        <label> Product Description </label>
        <input type="text" name="description" value="{{ $product->description }}" />
    </div>

    <div>
        <label> Product Price </label>
        <input type="text" name="price" value="{{ $product->price }}" />
    </div>

    <div>
        <label> Product Quantity </label>
        <input type="text" name="qty" value="{{ $product->qty }}" />
    </div>

    <button type="submit">Update Product</button>
</form>
</body>
</html>
