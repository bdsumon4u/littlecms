<?php

use App\Models\Service;
use App\Models\Slide;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'slides' => Slide::all(),
        'services' => Service::all(),
    ]);
});
