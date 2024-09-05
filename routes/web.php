<?php

use App\Models\Slide;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'slides' => Slide::all(),
    ]);
});
