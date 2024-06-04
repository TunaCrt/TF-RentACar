<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;

    protected $table = 'car_brands';


    public function models()
    {
        return $this->hasMany(CarModel::class,'brand_id','id');
    }
    public function cars()
    {
        return $this->hasManyThrough(Car::class,CarModel::class,'brand_id','model_id','id','id');
    }

    public function getCountCars(){
        return $this->cars->where('status',1)->count();
    }

}
