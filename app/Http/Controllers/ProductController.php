<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('product.index', ['products' => $product]);

    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

}
