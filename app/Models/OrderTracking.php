<?php

namespace App\Models;
use App\Models\OrderItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
   use HasFactory;

   public $table = "order_tracking";
   protected $fillable = [
    'user_id',
    'order_id', 
    'product_id', 
    'order_time', 
    'packed_time', 
    'shipped_time', 
    'order_time', 
    'order_item_id', 
];

public function orderItem()
{
    return $this->hasMany(OrderItem::class);
}
 
}