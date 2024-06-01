<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cars';

    protected $dates = ['$announcement_date'];

    public static function createCar($model_id,$damage_id,$district_id,$year,$color,$km,$garanti_status,$vites_turu,$yakit_turu,$announcement_date,$status,$fiyat,$description)
    {
        $car = new Car();
        $car->user_id = Auth::id();
        $car->model_id = $model_id;
        $car->damage_id = $damage_id;
        $car->district_id = $district_id;
        $car->year = $year;
        $car->color = $color;
        $car->km = $km;
        $car->garanti_status = $garanti_status;
        $car->vites_turu = $vites_turu;
        $car->yakit_turu = $yakit_turu;
        $car->announcement_date = $announcement_date;
        $car->status = $status;
        $car->fiyat = $fiyat;
        $car->description = $description;
        $car->save();

        return $car;

    }




}
