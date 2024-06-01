<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarDamage;
use App\Models\City;
use App\Models\MediaGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {


        return view('panel.cars.index');
    }

    public function create()
    {
        $cities = City::get();
        $cars = Car::latest()->take(8)->get();
        $brands = CarBrand::get();
        return view('panel.cars.create',compact('cities','cars','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required|integer',
            // 'damage_id' => 'required|integer',
            'year' => 'required|integer',
            'color' => 'required',
            'km' => 'required',
            'garanti_status' => 'boolean|required',
            'vites_turu' => 'required|min:0|max:2|integer',
            'yakit_turu' => 'required|min:0|max:2|integer',
            'status' => 'min:0|max:2|integer',
        ]);


        $currentDate = Carbon::now();

        $announcementDate = Carbon::parse($request->input('announcement_date'));

        if ($announcementDate->isAfter($currentDate)){
            $status = 0;
        }else{
            $status = 1;
        }


        $damage = CarDamage::create([
            'hasar_tarihi' => $request->hasar_tarihi,
            'damage_description' => $request->damage_description
        ]);



        $car =Car::createCar(
            $request->model_id,
            $damage->id,
            $request->district_id,
            $request->year,
            $request->color,
            $request->km,
            $request->garanti_status,
            $request->vites_turu,
            $request->yakit_turu,
            $announcementDate,
            $status,
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
