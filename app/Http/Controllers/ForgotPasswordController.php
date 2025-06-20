<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function form()
    {
        return view('autentikasi.forgotpass'); 
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email|exists:users,email',
        ], [
            // override pesan utk email tidak terdaftar atau invalid
            'email' => 'Email tidak terdaftar atau invalid.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Cek apakah email berhasil dikirim
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
