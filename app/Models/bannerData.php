<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bannerData extends Model
{
    use HasFactory;
    protected $table = 'sliderbanner';
    protected $fillable = [
      
        'file',
       
    ];
    
}