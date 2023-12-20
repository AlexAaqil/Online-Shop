<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'brand_id',
        'description',
        'size',
        'price',
        'new_price',
        'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getProductImages() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    // public function getProductImageURL() {
    //     $product_image_url = $this->getProductImages->first();

    //     if(!empty($product_image_url)) {
    //         return url('storage/public'.$product_image_url->image_name);
    //     }
    //     else {
    //         return asset('assets/images/default_product.jpg');
    //     }
    // }

    // public function getProductImageURLs() {
    //     $product_images = $this->productImages->map(function ($image) {
    //         return url('storage/' . $image->image_name);
    //     })->toArray();

    //     if(empty($product_images)) {
    //         return [asset('assets/images/default_product.jpg')];
    //     }

    //     return $product_images;
    // }
}
