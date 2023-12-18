<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use Auth;

class ProductController extends Controller
{
    public function list_products() {
        $products = Product::with('category', 'brand', 'createdBy')->get();
        return view("admin/products", compact("products"));
    }

    public function get_add_product() {
        $categories = Category::all();
        $brands = Brand::all();
        return view("admin/add_product", compact('categories', 'brands'));
    }

    public function post_add_product(Request $request) {
        request()->validate([
            'title'=> 'required|unique:products',
        ]);

        $product = new Product;

        $product->title = $request->title;
        $product->slug = Str::slug( $request->title);
        $product->description = $request->description;
        $product->color_code = $request->color_code;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->created_by = Auth::user()->id;

        $product->save();

        return redirect()->route('list_products')->with('success', "Product was added successfully");
    }

    public function get_update_product($id) {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view("admin/update_product", compact('product', 'categories', 'brands'));
    }

    public function post_update_product($id, Request $request) {
        request()->validate([
            'title' => 'required|unique:products,title,'.$id,
        ]);

        $product = Product::find($id);

        $product->title = $request->title;
        $product->slug = Str::slug( $request->title);
        $product->description = $request->description;
        $product->color_code = $request->color_code;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        $product->save();

        return redirect()->route('list_products')->with('success', "Product was updated successfully");
    }

    public function delete_product($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('list_products')->with('success', "Product deleted successfully!");
    }
}
