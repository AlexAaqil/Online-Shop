<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop() {
        $products = Product::all();
        $categories = Category::all();
        return view("shop", compact('products', 'categories'));
    }

    public function categorised_products($slug) {
        $products = Product::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        return view("categorised_products", compact('products', 'category', 'categories'));
    }
}
