<?php

use App\Models\Media;
use App\Models\Person;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'slides' => Slide::all(),
        'services' => Service::all(),
        'people' => Person::all(),
        'testimonials' => Testimonial::all(),
        'gallery' => Media::query()->get()->groupBy('group'),
    ]);
});
