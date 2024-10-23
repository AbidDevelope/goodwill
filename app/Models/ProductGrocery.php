<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductGrocery extends Model
{
    use HasFactory;

    protected $table = 'product_grocery'; 

    protected $fillable = [
        'product_id', 'image', 'original_price', 'selling_price', 'quantity',
    ];

    public function groceries()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
