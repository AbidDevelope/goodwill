<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Caters extends Model
{
    use HasFactory;
     protected $table = 'productcategorie';
    protected $fillable = [
        'product_name',
        'category',
        'subcategory',
        'file',
        'price',
        'product_description',
      
    ];
    
}