<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use Illuminate\Http\Request;

class BrandController extends Controller
{


    public function index()
    {
        $brands = CarBrand::get();

        return view('panel.admin.brands.index',compact('brands'));
    }

    public function create()
    {
        return view('panel.admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

       $brand = new CarBrand();
            $brand->name = $request->name;

        if($request->hasFile('photo')) {
           $photo = $request->file('photo');
                $imageName = time().'_'.uniqid().'.'.$photo->extension();
                $photo->move(public_path('panel/img'), $imageName);


               $brand->photo = $imageName;

        }
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success','Marka Başarıyla Oluşturuldu');
    }

}
