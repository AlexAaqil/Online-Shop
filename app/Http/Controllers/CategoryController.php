<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function list_categories() {
        $categories = Category::all();
        return view("admin/categories", compact("categories"));
    }

    public function get_add_category() {
        return view("admin/add_category");
    }

    public function post_add_category(Request $request) {
        request()->validate([
            'title'=> 'required|unique',
        ]);

        $category = new Category;
        $category->title = $request->title;
        $category->slug = Str::slug( $request->slug);
        $category->description = $request->description;
        $category->save();

        return view("admin/categories")->with('success', "Category was added successfully");
    }
}
