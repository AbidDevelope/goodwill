<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SelectAddress;
use App\Models\User;
use App\Models\Order;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_address';

    protected $fillable = [
        'user_id',
        'city',
        'area_or_street',
        'flat_no_building_name',
        'pincode',
        'state',
        'land_mark',
        'name',
        'mobile',
        'optional_mobile',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function selectAddress()
    {
        return $this->hasOne(SelectAddress::class, 'address_id', 'id');
    }
}