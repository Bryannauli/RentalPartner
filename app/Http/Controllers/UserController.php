<?php

namespace App\Http\Controllers;

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

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Autentikasi berhasil, redirect ke halaman utama
        return redirect()->intended(route('landing.index'));
    }

    // Autentikasi gagal, kembali ke halaman login dengan error
    return Redirect::back()->withErrors(['email' => 'Email atau password salah.']);
}

    public function login_admin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'access_level',
    ]);

    $credentials = $request->only('email', 'password', 'access_level');

    if (Auth::attempt($credentials)) {
        // Autentikasi berhasil, redirect ke halaman admin
        return redirect()->intended(route('landing.admin'));
    }

    // Autentikasi gagal, kembali ke halaman login dengan error
    return Redirect::back()->withErrors(['email' => 'Email atau password salah.']);
}

}
