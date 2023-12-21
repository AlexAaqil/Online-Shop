<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Auth;

class SubCategoryController extends Controller
{
    public function list_sub_categories(){
        $sub_categories = SubCategory::all();
        return view("admin/sub_categories", compact("sub_categories"));
    }

    public function get_add_sub_category(){
        $categories = Category::all();
        return view("admin/add_sub_category", compact("categories"));
    }

    public function post_add_sub_category(Request $request){
        request()->validate([
            'title'=> 'required|unique:sub_categories',
        ]);

        $sub_category = new SubCategory;
        $sub_category->title = $request->title;
        $sub_category->slug = Str::slug( $request->title);
        $sub_category->category_id = $request->category_id;
        $sub_category->created_by = Auth::user()->id;
        $sub_category->save();

        return redirect("admin/subcategories")->with('success', "Sub category was added successfully");
        
    } 

    public function get_update_sub_category($id){
        $categories = Category::all();
        $sub_category = SubCategory::find($id);
        return view("admin/update_sub_category" , compact('sub_category', 'categories') );    
    }

    public function post_update_sub_category($id, Request $request){
        request()->validate([ 
            'title' => 'required|unique:sub_categories,title,'.$id,
        ]);

        $sub_category = SubCategory::find($id);
        $sub_category->title = $request->title;
        $sub_category->slug = Str::slug( $request->title);
        $sub_category->category_id = $request->category_id;
        $sub_category->created_by = Auth::user()->id;
        $sub_category->save();

        return redirect("admin/subcategories")->with('success', "Sub category was updated successfully");
    }

    public function delete_sub_category($id){
       $sub_category = SubCategory::find($id);
       $sub_category->delete();

       return redirect("admin/subcategories")->with("success","Sub category was deleted successfully");
    }
}
