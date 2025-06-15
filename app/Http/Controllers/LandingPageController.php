<?php

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function main()
    {
        return view('user.main');
    }

    public function login(){
        return view('landing.login');
    }

    public function admin(){
        return view('admin.dashboard');
    }

    public function index()
    {
    $cars = Car::all();
    return view('user.index', compact('cars'));
    }

    public function payment(){
        return view ('user.payment');
    }
 public function process(){
        return view ('payment.process');
    }
    
}




