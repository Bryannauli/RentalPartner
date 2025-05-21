<?php

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function main()
    {
        return view('landing.main');
    }

    public function login(){
        return view('landing.login');
    }

    public function index()
    {
    $cars = Car::all();
    return view('landing.index', compact('cars'));
    }
}




