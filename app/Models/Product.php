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
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('order_by', 'asc');
    }

    public function getFirstImage() {
        $productImages = $this->getProductImages;
        $imagePath = $productImages->isNotEmpty()
            ? $productImages->first()->image_name
            : '/assets/images/default_product.jpg';

        return url('storage/' . $imagePath); // Include url() generation here
    }
}
