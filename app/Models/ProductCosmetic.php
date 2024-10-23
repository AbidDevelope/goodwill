<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class ProductCosmetic extends Model
{
    
    protected $table = 'product_cosmetics';

    protected $fillable = [
        'product_id', 
        'colorName', 
        'image',
        'original_price',
        'selling_price',
        'quantity',
    ];


public function product()
{
    return $this->belongsTo(Product::class, 'product_id', 'id');
}
   
}