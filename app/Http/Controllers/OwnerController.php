<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        $owner = $user->owner;

        if ($owner && $owner->status === 'suspended') {
            return redirect()->route('user.index')->with('error', 'Akun Owner Anda ditangguhkan.');
        }
        return view('owner.dashboard');    
    }

    public function riwayat(){
        return view('owner.riwayat');    
    }
    public function order(){
        return view('owner.order');    
    }
}
