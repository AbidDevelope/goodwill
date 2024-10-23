<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class ProductFurniture extends Model
{
    use HasFactory;

    protected $table = 'product_furniture'; 

    protected $fillable = [
        'product_id', 'image', 'original_price', 'selling_price', 'quantity',
    ];

    public function furniture()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
