<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{

    public function create($id)
    {

            $brand = CarBrand::find($id);

            $models = CarModel::where('brand_id',$id)->get();

        return view('panel.admin.models.create',compact('brand','models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|integer' ,
            'name' => 'required'
        ]);

        CarModel::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name
        ]);

        return redirect()->back()->with('success','Model Oluşturuldu');
    }

}
