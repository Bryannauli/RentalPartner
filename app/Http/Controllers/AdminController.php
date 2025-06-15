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

    public function mobil() {
        return view('admin.mobil');
    }

    public function ownerRequests() {
        return view('admin.owner');
    }

    public function posts() {
        return view('admin.postingan');
    }

    public function review() {
        return view('admin.review');
    }

    public function history() {
        return view('admin.history');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


}
