<?php
namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function featured()
    {
        $cars = Car::all();
        return view('user.featured', compact('cars'));
    }

 public function detail($id)
{
    $car = Car::findOrFail($id);
    return view('user.detail', compact('car'));
}

}

