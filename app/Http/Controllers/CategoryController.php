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
            'title'=> 'required|unique:categories',
        ]);

        $category = new Category;
        $category->title = $request->title;
        $category->slug = Str::slug( $request->title);
        $category->save();

        return redirect("admin/categories")->with('success', "Category was added successfully");
    }

    public function get_update_category($id) {
        $category = Category::find($id);
        return view("admin/update_category", compact('category'));
    }

    public function post_update_category($id, Request $request) {
        request()->validate([
            'title' => 'required|unique:categories,title,'.$id,
        ]);

        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = Str::slug( $request->title );
        $category->save();

        return redirect("admin/categories")->with('success', "Category was updated successfully");
    }

    public function delete_category($id) {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('list_categories')->with('success', "Category deleted successfully!");
    }
}
