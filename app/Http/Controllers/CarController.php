<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function create()
    {
        return view('panel.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'model_id' => 'required|integer',
            'damage_id' => 'required|integer',
            'year' => 'required|integer',
            'color' => 'required',
            'km' => 'required',
            'garanti_status' => 'boolean',
            'vites_turu' => 'required|min:0|max:2|integer',
            'yakit_turu' => 'required|min:0|max:2|integer',
            'status' => 'min:0|max:2|integer',
        ]);

        Car::createCar(
            $request->model_id,
            $request->damage_id,
            $request->district_id,
            $request->year,
            $request->color,
            $request->km,
            $request->garanti_status,
            $request->vites_turu,
            $request->yakit_turu,
            $request->announcement_date,
            $request->status,               //announcement_date ile ilişkili bir değer yazılacak
            $request->fiyat,
            $request->description
        );
    }

}
