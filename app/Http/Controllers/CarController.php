<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\MediaGallery;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {


        return view('panel.cars.index');
    }

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

        $car =Car::createCar(
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

        if($request->hasFile('photos')) {
            foreach($request->file('photos') as $photo) {
                $imageName = time().'_'.uniqid().'.'.$photo->extension();
                $photo->move(public_path('panel/img'), $imageName);


                MediaGallery::create([
                    'car_id' => $car->id,
                    'media' => $imageName,
                ]);

            }
        }

        return redirect()->route('cars.create')->with('success','Araba Oluşturuldu');

    }

}
