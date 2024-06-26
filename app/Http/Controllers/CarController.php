<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarDamage;
use App\Models\City;
use App\Models\MediaGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{

    public function indexForAdmin($id = 0)
    {
        if ($id==0){
            $cars = Car::where('status',1)->latest()->paginate(5);
        }else{
            $brand = CarBrand::find($id);
            $cars = $brand->cars->where('status',1);
        }

        $brands = CarBrand::get();


        return view('panel.admin.cars.index',compact('cars','brands'));
    }

    public function indexForSeller($id = 0)
    {
        if ($id==0){
            $cars = Car::where('status',1)->latest()->paginate(5);
        }else{
            $brand = CarBrand::find($id);
            $cars = $brand->cars->where('status',1);
        }

        $brands = CarBrand::get();


        return view('panel.seller.cars.index',compact('cars','brands'));
    }

    public function createForAdmin()
    {
        $cities = City::get();
        $cars = Car::where('status',1)->latest()->take(8)->get();
        $brands = CarBrand::get();
        return view('panel.admin.cars.create',compact('cities','cars','brands'));
    }

    public function createForSeller()
    {
        $cities = City::get();
        $cars = Car::where('status',1)->latest()->take(8)->get();
        $brands = CarBrand::get();
        return view('panel.seller.cars.create',compact('cities','cars','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'model_id' => 'required|integer',
            'brand_id' =>'required|integer',
            // 'damage_id' => 'required|integer',
            'district_id' => 'required|integer',
            'city_id' => 'required|integer',
            'year' => 'required|integer',
            'color' => 'required',
            'km' => 'required|integer',
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

        return redirect()->back()->with('success','Araba Oluşturuldu');
    }


    public function showForAdmin($id)
    {
        $car = Car::find($id);
        $cars = Car::where('status',1)->latest()->take(8)->get();

        if ($car->status == 1){
            return view('panel.admin.cars.show',compact('car','cars'));

        }

        return redirect()->back();
    }

    public function showForSeller($id)
    {
        $car = Car::find($id);
        $cars = Car::where('status',1)->latest()->take(8)->get();

        if ($car->status == 1){
            return view('panel.seller.cars.show',compact('car','cars'));

        }

        return redirect()->back();
    }


    public function destroyForAdmin($id)
    {
        $car = Car::findOrFail($id);

        $carMedias = $car->media;

        foreach ($carMedias as $media) {
            $filePath = public_path('panel/img/' . $media->media);

            // Dosya mevcutsa sil
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Medya kaydını veritabanından sil
            $media->delete();
        }

        $car->delete();

        return redirect()->route('admin.cars.index')->with('success','Araba Başarıyla Silindi');

    }

    public function destroyForSeller($id)
    {
        $car = Car::findOrFail($id);

        $carMedias = $car->media;

        foreach ($carMedias as $media) {
            $filePath = public_path('panel/img/' . $media->media);

            // Dosya mevcutsa sil
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Medya kaydını veritabanından sil
            $media->delete();
        }

        $car->delete();

        return redirect()->route('seller.cars.index')->with('success','Araba Başarıyla Silindi');

    }


}
