<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $posts = Post::where('status_verifikasi', 'approved');

        if (Auth::check() && Auth::user()->owner) {
            $ownerId = Auth::user()->owner->id;
            $posts->where('owner_id', '!=', $ownerId);
        }

        $posts = $posts->latest()->get();

        return view('user.index', compact('posts'))->with('layout', 'landing');
    }

    public function payment(){
        return view ('user.payment');
    }

    public function process(){
        return view ('payment.process');
    }

}




