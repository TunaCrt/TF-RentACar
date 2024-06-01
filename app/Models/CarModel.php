<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(CarBrand::class,'brand_id','id');
    }


}
