<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{

    public function create($id =0)
    {
        if ($id==0){
            $brands = CarBrand::get();
        }else{
            $brands = CarBrand::where('id',$id)->get();
        }


        return view('panel.admin.models.create',compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required' ,
            'name' => 'required'
        ]);

        CarModel::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name
        ]);

        return redirect()->back()->with('success','Model Oluşturuldu');
    }

}
