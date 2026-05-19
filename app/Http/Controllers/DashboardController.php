<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Activity;

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
            ->latest()
            ->take(5)
            ->get();

        $outOfStockProducts = Product::with('category')
            ->where('qty', 0)
            ->latest()
            ->take(5)
            ->get();

        // recnt actvty
        $recentActivities = Activity::with('product.category')
            ->latest()
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
            'outOfStockProducts',
            'recentActivities'
        ));
    }
}
