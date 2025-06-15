<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard(){
        return view('owner.dashboard');    
    }
    public function history(){
        return view('owner.history');    
    }
    public function order(){
        return view('owner.order');    
    }
}
