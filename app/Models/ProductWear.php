<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class ProductWear extends Model
{
    protected $table = 'product_wears';

    protected $fillable = [
        'product_id', 
        'colorName', 
        'image',
        'sizeName',
        'original_price',
        'selling_price',
        'quantity',
    ];


  public function product()
    {
        return $this->belongsTo(Product::class);
    }
   
}