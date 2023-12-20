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
        $products = Product::with('category', 'brand', 'createdBy', 'getProductImages')->get();
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
                $random_string = date('Ymdhis').Str::random(5);
                $extension = $image->getClientOriginalExtension();
                $filename = $random_string. '.' .$extension;

                $image_path = $image->storeAs('products', $filename, 'public');

                $image_upload = new ProductImage;
                $image_upload->image_name = $image_path;
                $image_upload->product_id = $product->id;

                $image_upload->save();
            }
        }

        return redirect()->route('list_products')->with('success', "Product was added successfully");
    }

    public function get_update_product($id) {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $product_images = $product->getProductImages;
        return view("admin/update_product", compact('product', 'categories', 'brands', 'product_images'));
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
        $existing_images = $product->getProductImages->pluck('image_name')->toArray();

        // Check if new images are being uploaded
        $images = $request->file('images');
        if ($images) {
            $total_images = count($existing_images) + count($images);

            // Check if the total number of images doesn't exceed five
            if ($total_images <= 5) {
                foreach ($images as $image) {
                    $random_string = date('Ymdhis').Str::random(5);
                    $extension = $image->getClientOriginalExtension();
                    $filename = $random_string. '.' .$extension;

                    $image_path = $image->storeAs('products', $filename, 'public');

                    $image_upload = new ProductImage;
                    $image_upload->image_name = $image_path;
                    $image_upload->product_id = $product->id;

                    $image_upload->save();
                }
            } else {
                return redirect()->route('get_update_product', $product->id)->withErrors(['images' => 'You can upload a maximum of five images.'])->withInput();
            }
        }

        return redirect()->route('list_products')->with('success', 'Product was updated successfully');
    }

    public function product_images_sort(Request $request) {
        if(!empty($request->photo_id)) {
            $i = 1;
            foreach($request->photo_id as $photo_id) {
                $image = ProductImage::find($photo_id);
                $image->order_by = $i;
                $image->save();

                $i++;
            }
        }

        $json['success'] = true;
        echo json_encode($json);
    }

    public function delete_product_image($id) {
        // Delete the selected image matching the condition
        $image = ProductImage::find($id);

        // Delete from the database
        $image->delete();

        // Delete the file from storage
        Storage::disk('public')->delete($image->image_name);

        return redirect()->route('get_update_product', $image->product_id)->with('success','Image deleted Successfully');
    }

    public function delete_product($id) {
        $product = Product::find($id);

        // Retrieve image paths before deleting from database
        $image_paths = $product->getProductImages->pluck('image_name')->toArray();

        // Delete the product images (database records)
        $product->getProductImages()->delete();

        // Delete the product
        $product->delete();

        // Delete the files from storage
        foreach ($image_paths as $image_path) {
            Storage::disk('public')->delete($image_path);
        }

        return redirect()->route('list_products')->with('success', "Product deleted successfully!");
    }
}
