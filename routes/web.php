<?php

use App\Http\Controllers\CarController;
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
