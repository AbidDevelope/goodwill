<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\ProductImage;
use App\Models\OrderItem;
use App\Models\ProductCosmetic;
use App\Models\ProductWear;
use App\Models\ProductGrocery;
use App\Models\ProductFurniture;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'vendor_id',
        'vendortype',
        'image',
        'name',
        'slug',
        'brand',
        'category_id',
        'subcategory',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'color',
        'featurename',
        'other_details',
        'product_details',
    ];

    public function productWear()
    {
        return $this->hasOne(ProductWear::class);
    }
 

    public function ProductSpecification()
    {
        return $this->hasMany(ProductWear::class);
    }


     public function Category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }


    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}