<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Car;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function main()
    {
        $cars = Car::all();
        return view('preview.main',  compact('cars'));
    }

    public function login(){
        return view('autentikasi.login');
    }

    public function registerForm(){
        return view('autentikasi.regis');
    }

    public function admin(){
        return view('admin.dashboard');
    }

    public function index(){
        $posts = Post::where('status_verifikasi', 'approved')->latest()->get();
        return view('user.index', compact('posts'))->with('layout', 'landing');
    }

    public function payment(){
        return view ('user.payment');
    }

    public function process(){
        return view ('payment.process');
    }

}




