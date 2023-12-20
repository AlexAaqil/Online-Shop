<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductImageURL() {
        if(!empty($this->image_name)) {
            return url('storage/'.$this->image_name);
        }
        else {
            return asset('assets/images/default_product.jpg');
        }
    }

    protected $fillable = [
        'image_name',
        'product_id',
    ];
}
