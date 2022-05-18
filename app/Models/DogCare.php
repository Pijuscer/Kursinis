<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogCare extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vardas',
        'pavarde',
        'telefono_numeris',
        'adresas',
        'suns_veisle',
        'suns_amzius',
        'suns_svoris',
        'draugiskas',
        'alergiskas'
    ];
}
