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

    //admin start
    Route::middleware('isAdmin')->group(function (){
        Route::prefix('/admin')->name('admin.')->group(function (){
            Route::prefix('/brand')->name('brand.')->group(function (){

                Route::get('/create',[BrandController::class,'create'])->name('create');
                Route::get('/index',[BrandController::class,'index'])->name('index');
                Route::post('/store',[BrandController::class,'store'])->name('store');

            });
            Route::prefix('/model')->name('model.')->group(function (){
                Route::get('/create/{id}',[ModelController::class,'create'])->name('create');
                Route::post('/store',[ModelController::class,'store'])->name('store');
            });
            Route::prefix('/cars')->name('cars.')->group(function (){
                Route::get('/index/{id?}',[CarController::class,'indexForAdmin'])->name('index');
                Route::get('/create',[CarController::class,'createForAdmin'])->name('create');
                Route::get('/show/{id}',[CarController::class,'showForAdmin'])->name('show');
                Route::post('/store',[CarController::class,'store'])->name('store');
            });
        });
    });

    //admin end

    //seller start
    Route::prefix('/seller')->name('seller.')->group(function (){

        Route::prefix('/cars')->name('cars.')->group(function (){
            Route::get('/index/{id?}',[CarController::class,'indexForSeller'])->name('index');
            Route::get('/create',[CarController::class,'createForSeller'])->name('create');
            Route::get('/show/{id}',[CarController::class,'showForSeller'])->name('show');
            Route::post('/store',[CarController::class,'store'])->name('store');
        });
    });
    //seller end

});
