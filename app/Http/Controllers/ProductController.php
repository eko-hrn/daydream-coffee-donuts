<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category');

        $categories = Product::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category', 'asc')
            ->pluck('category');

        $products = Product::query()
            ->when($selectedCategory, function ($query) use ($selectedCategory) {
                $query->where('category', $selectedCategory);
            })
            ->orderByDesc('is_best_seller')
            ->latest()
            ->paginate(3)
            ->withQueryString();

        return view('pages.products', compact(
            'products',
            'categories',
            'selectedCategory'
        ));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->orderByDesc('is_best_seller')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.product-detail', compact(
            'product',
            'relatedProducts'
        ));
    }
}