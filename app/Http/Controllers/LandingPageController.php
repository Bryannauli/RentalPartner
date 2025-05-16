<?php

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
         $cars = Car::all();
     return view('landing.index', compact('cars'));
    }
}
