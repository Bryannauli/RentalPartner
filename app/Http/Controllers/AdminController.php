<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function users() {
        return view('admin.user');
    }

    public function ownerRequests() {
        return view('admin.owner');
    }

    public function posts() {
        return view('admin.postingan');
    }

    public function reports() {
        return view('admin.laporan');
    }

    public function settings() {
        return view('admin.settings');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


}
