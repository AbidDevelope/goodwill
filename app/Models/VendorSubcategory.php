<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VendorCategory;

class VendorSubcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category',
        'sub_category',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(VendorCategory::class);
    }
}
