<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UserAddress;


class SelectAddress extends Model
{
    use HasFactory;
    
    protected $table = 'selected_address';
    
    protected $fillable = [
        'user_id',
        'address_id ',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class, 'address_id');
    }
}