<?php

use App\Http\Controllers\LandingPageController;

Route::get('/', function () {
    return view('landing.index');
});

