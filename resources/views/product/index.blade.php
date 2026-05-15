<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div>
        <a href="{{ route('product.create') }}">Create Product</a>
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->qty }}</td>
                <td>
                    <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('product.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="" value= " Delete " />
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</body>
</html>
