<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\UserAddress;
use App\Models\Transaction;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    // protected $primaryKey = 'address_id';

    protected $fillable = [
        'user_id',
        'address_id',
        'payment_status',
        'payment_mode',
        'status',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function userAddress()
    {
       return $this->hasOne(UserAddress::class, 'address_id', 'id');
    }
}