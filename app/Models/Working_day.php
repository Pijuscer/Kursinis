<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Working_day extends Model
{
    use HasFactory;
    protected $fillable = [
        'metai',
        'menesis',
        'diena',
        'laisvumas'
    ];
}
