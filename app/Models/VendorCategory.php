<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VendorSubcategory;

class VendorCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category'
    ];

    public function subcategory()
    {
        return $this->hasMany(VendorSubcategory::class, 'category_id', 'id');
    }
}