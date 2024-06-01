<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDamage extends Model
{
    use HasFactory;

    protected $table = 'car_damages';

    protected $fillable = [
        'hasar_tarihi',
        'damage_description'
    ];

}
