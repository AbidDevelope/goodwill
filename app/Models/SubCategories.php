<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class SubCategories extends Model
{
    protected $table = 'subcategory';
    protected $fillable = [
        'subcategory',
        'category_id ',
        'subcategory_image',
    ];
   public function Category()
   {
    return $this->belongsTo(Categories::class);
   }  
}
