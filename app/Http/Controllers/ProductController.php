<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $products = Product::where('name', 'LIKE', "%{$search}%")
           ->orWhere('description', 'LIKE', "%{$search}%")
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
            'qty' => 'required|integer',
        ]);

        Product::create([
           'name' => $request->name,
           'description' => $request->description,
           'price' => $request->price,
           'qty' => $request->qty,
           'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
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
            'qty' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }
}
