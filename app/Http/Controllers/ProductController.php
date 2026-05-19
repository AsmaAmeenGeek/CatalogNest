<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Activity;

class ProductController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $products = Product::where(function ($query) use ($search) {
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('description', 'LIKE', "%{$search}%");
        })
              ->orWhereHas('category', function ($query) use ($search) {
        $query->where('name', 'LIKE', "%{$search}%");
    })
    ->get();

        return view('product.index', compact('products', 'search'));
   }

    public function create(){
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'price' => 'required|numeric',
        'qty' => 'required|integer|min:0',
    ]);

    // ✅ STEP 1: STORE PRODUCT IN VARIABLE
    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'qty' => $request->qty,
        'category_id' => $request->category_id,
    ]);

    // ✅ STEP 2: NOW LOG ACTIVITY SAFELY
    Activity::create([
        'type' => 'created',
        'message' => 'Product "' . $product->name . '" was created',
        'product_id' => $product->id,
    ]);

    return redirect()->route('product.index')
        ->with('success', 'Product created successfully.');
}


        public function edit($id){
            $product = Product::findOrFail($id);
            $categories = Category::all();

            return view('product.edit', compact('product', 'categories'));
       }

public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'price' => 'required|numeric',
        'qty' => 'required|integer|min:0',
        'category_id' => 'nullable|exists:categories,id',
    ]);

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'qty' => $request->qty,
        'category_id' => $request->category_id,
    ]);

    Activity::create([
    'type' => 'updated',
    'message' => 'Product "' . $product->name . '" was updated',
    'product_id' => $product->id,
]);

    return redirect()->route('product.index')
        ->with('success', 'Product updated successfully.');
}

    public function destroy(Product $product)
    {
        Activity::create([
    'type' => 'deleted',
    'message' => 'Product "' . $product->name . '" was deleted',
    'product_id' => $product->id,
]);

$product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }
}
