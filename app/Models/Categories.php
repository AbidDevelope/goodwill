<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategories;
use App\Models\Product;

class Categories extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'id',
        'name',
        'category_image',

    ];
   public function SubCategory()
   {
    return $this->hasMany(SubCategories::class, 'category_id');
   }

   public function Product()
   {
    return $this->hasMany(Product::class, 'category_id');
   }
}
