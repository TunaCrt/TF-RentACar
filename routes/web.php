<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ModelController;
use App\Models\CarModel;
use App\Models\District;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('panel.layouts.app');
});
Route::prefix('/cars')->name('cars.')->group(function (){
    Route::get('/create',[CarController::class,'create'])->name('create');
    Route::get('/index',[CarController::class,'index'])->name('index');
    Route::get('/show/{id}',[CarController::class,'show'])->name('show');
    Route::post('/store',[CarController::class,'store'])->name('store');

});

Route::prefix('/admin')->name('admin.')->group(function (){
    Route::prefix('/brand')->name('brand.')->group(function (){

        Route::get('/create',[BrandController::class,'create'])->name('create');
        Route::get('/index',[BrandController::class,'index'])->name('index');
        Route::get('/show/{id}',[BrandController::class,'show'])->name('show');
        Route::post('/store',[BrandController::class,'store'])->name('store');

    });

    Route::prefix('/model')->name('model.')->group(function (){

        Route::get('/create',[ModelController::class,'create'])->name('create');
        Route::get('/index',[ModelController::class,'index'])->name('index');
        Route::get('/show/{id}',[ModelController::class,'show'])->name('show');
        Route::post('/store',[ModelController::class,'store'])->name('store');

    });

});



Route::get('/districts/{city_id}',function ($city_id){

    $districts = District::where('city_id', $city_id)->get();
    return response()->json($districts);
});

Route::get('/models/{brand_id}',function ($brand_id){

    $models = CarModel::where('brand_id', $brand_id)->get();
    return response()->json($models);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



});
