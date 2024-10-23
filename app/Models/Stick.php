<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stick extends Model
{
    use HasFactory;
    protected $table = 'stick_banner';
    protected $fillable = [
      
        'file',
        'name', 
    ];
    
}