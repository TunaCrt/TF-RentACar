<?php

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;
use \App\Models\User;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call(function () {

    $cars = Car::where('status',0)->get();

    foreach ($cars as $car) {
        $announcement_date = Carbon::parse($car->announcement_date);
        if (!$announcement_date->isAfter(Carbon::now())){
            $car->status=1;
            $car->save();
        }
    }
})->everyMinute();
