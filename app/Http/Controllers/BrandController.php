<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list_brands() {
        $brands = Brand::all();
        return view("admin/brands", compact("brands"));
    }

    public function get_add_brand() {
        return view("admin/add_brand");
    }

    public function post_add_brand(Request $request) {
        request()->validate([
            'title'=> 'required|unique:brands',
        ]);

        $brand = new Brand;
        $brand->title = $request->title;
        $brand->save();

        return redirect()->route('list_brands')->with('success', "Brand was added successfully");
    }

    public function get_update_brand($id) {
        $brand = Brand::find($id);
        return view("admin/update_brand", compact('brand'));
    }

    public function post_update_brand($id, Request $request) {
        request()->validate([
            'title' => 'required|unique:brands,title,'.$id,
        ]);

        $brand = Brand::find($id);
        $brand->title = $request->title;
        $brand->save();

        return redirect()->route('list_brands')->with('success', "Brand was updated successfully");
    }

    public function delete_brand($id) {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('list_brands')->with('success', "Brand deleted successfully!");
    }
}
