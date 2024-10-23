<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderTracking;


class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    
    protected $fillable = [
        'order_id',
        'user_id',
        'address_id',
        'product_wear_id',
        'product_id',
        'vendor_id',
        'price',
        'quantity',
    ];
 
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderTracking()
    {
        return $this->belongsTo(OrderTracking::class);
    }

    public function userAddress()
    {
        return $this->hasMany(UserAddress::class, 'address_id', 'id');
    }
}