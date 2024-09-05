<?php

use App\Models\Appointment;
use App\Models\Media;
use App\Models\Person;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

Route::post('/appointments', function (Request $request) {
    $data = $request->validate([
        'service_id' => 'required|integer|exists:services,id',
        'name' => 'required|string',
        'phone' => 'required|string',
        'fdate' => 'required|date|after:today',
        'message' => 'required|string',
    ]);

    $data['date'] = Arr::pull($data, 'fdate');

    Appointment::create($data);

    return back()->with('message', 'Appointment request submitted successfully!');
});
