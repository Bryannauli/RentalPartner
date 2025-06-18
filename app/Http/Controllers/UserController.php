<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function register(Request $request){
        //cek berhasil diterima controller atau ga
        // dd($request->all());
        $request->validate([
            'register-name' => 'required|string|max:255',
            'register-email' => 'required|email|unique:users,email',
            'register-phone' => 'required|string|max:20',
            'register-password' => 'required|min:6|same:register-confirm-password',
            'register-confirm-password' => 'required',
            'terms' => 'required',
        ]);

        User::create([
            'name' => $request->input('register-name'),
            'email' => $request->input('register-email'),
            'phone' => $request->input('register-phone'),
            'password' => Hash::make($request->input('register-password')),
        ]);

    
    return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->access_level === 0) {
                return redirect()->intended(route('user.admin'));
            }
            // Autentikasi berhasil, redirect ke halaman utama
            return redirect()->intended(route('user.index'));
        }
    }

    public function home(){
        return view('user.main');    
    }


    public function submitUpgrade(Request $request){
    $request->validate([
        'nik' => 'required|string|max:20|unique:owners,nik',
        'phone' => 'required|string|max:15|unique:owners,phone',
        'address' => 'required|string|max:255',
        'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'sim' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'stnk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $user = Auth::user();

    // cek apakah sudah pernah jadi owner
    if ($user->owner) {
        return back()->with('info', 'Kamu sudah terdaftar sebagai owner.');
    }
    
    // upload file
    $ktp = $request->file('ktp')->store('dokumen/ktp', 'public');
    $sim = $request->file('sim')->store('dokumen/sim', 'public');
    $stnk = $request->file('stnk')->store('dokumen/stnk', 'public');

    // simpan ke tabel owners
    Owner::create([
        'user_id' => $user->id,
        'nik' => $request->nik,
        'phone' => $request->phone,
        'address' => $request->address,
        'ktp' => $ktp,
        'sim' => $sim,
        'stnk' => $stnk,
    ]);

    return redirect()->route('user.index')->with('success', 'Permintaan upgrade dikirim.');
    }


};
