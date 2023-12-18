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
        'color_code',
        'size',
        'price',
        'new_price',
        'created_by',
    ];
}
