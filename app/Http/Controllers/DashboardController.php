<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),

            'activeProducts' => Product::where('qty', '>', 0)->count(),
            'outOfStock' => Product::where('qty', 0)->count(),
            'lowStock' => Product::where('qty', '>', 0)
                                ->where('qty', '<=', 5)
                                ->count(),

            'recentProducts' => Product::with('category')
                                    ->latest()
                                    ->take(5)
                                    ->get(),
        ]);
    }
}
