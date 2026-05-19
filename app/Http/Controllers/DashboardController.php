<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
{
    $totalProducts = Product::count();
    $totalCategories = Category::count();

    $activeProducts = Product::where('qty', '>', 0)->count();
    $outOfStock = Product::where('qty', 0)->count();

    $lowStock = Product::where('qty', '>', 0)
                    ->where('qty', '<=', 5)
                    ->count();

    $lowStockProducts = Product::where('qty', '>', 0)
                    ->where('qty', '<=', 5)
                    ->orderBy('qty', 'asc')
                    ->take(5)
                    ->get();

    $recentProducts = Product::with('category')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

    // ⭐ NEW: ACTIVITY FEED
    $recentActivities = Product::with('category')
                    ->orderBy('updated_at', 'desc')
                    ->take(5)
                    ->get();

    return view('dashboard', compact(
        'totalProducts',
        'totalCategories',
        'activeProducts',
        'outOfStock',
        'lowStock',
        'lowStockProducts',
        'recentProducts',
        'recentActivities'
    ));
}
}
