<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard(){
        return view('owner.dashboard');    
    }
    public function riwayat(){
        return view('owner.riwayat');    
    }
    public function order(){
        return view('owner.order');    
    }
}
