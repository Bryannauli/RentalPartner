<?php
namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function featured()
    {
        $cars = Car::all();
        return view('landing.featured', compact('cars'));
    }

 public function detail($id)
{
    $car = Car::findOrFail($id);
    return view('landing.detail', compact('car'));
}

}

