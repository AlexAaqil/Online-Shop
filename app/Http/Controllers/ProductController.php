<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Storage;

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
        $product->size = $request->size;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->created_by = Auth::user()->id;

        $product->save();

        $images = $request->file('images');
        if($images) {
            foreach($images as $image) {
                $image_path = $image->store('products', 'public');

                $image_upload = new ProductImage;
                $image_upload->image_name = $image_path;
                $image_upload->product_id = $product->id;

                Storage::disk('public')->delete($image_upload->image_name);

                $image_upload->save();
            }
        }

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
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        $product->save();

        // Retrieve existing images
        $existing_images = $product->productImages->pluck('image_name')->toArray();

        // Check if new images are being uploaded
        $images = $request->file('images');
        if ($images) {
            $total_images = count($existing_images) + count($images);

            // Check if the total number of images doesn't exceed five
            if ($total_images <= 5) {
                foreach ($images as $image) {
                    $image_path = $image->store('products', 'public');

                    $image_upload = new ProductImage;
                    $image_upload->image_name = $image_path;
                    $image_upload->product_id = $product->id;

                    $image_upload->save();
                }
            } else {
                return redirect()->route('get_update_product', $product->id)->withErrors(['images' => 'You can upload a maximum of five images.'])->withInput();
            }

            // Remove images that are explicitly marked for deletion
            $images_to_delete = $request->input('delete_images', []);
            foreach ($images_to_delete as $image_to_delete) {
                // Delete all records matching the condition
                $product_images = ProductImage::where('image_name', $image_to_delete)->get();

                foreach ($product_images as $product_image) {
                    $product_image->delete();
                }

                // Delete the file from storage
                Storage::disk('public')->delete($image_to_delete);
            }
        }

        return redirect()->route('list_products')->with('success', 'Product was updated successfully');
    }



    public function delete_product($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('list_products')->with('success', "Product deleted successfully!");
    }
}
