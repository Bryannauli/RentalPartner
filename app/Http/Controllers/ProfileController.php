<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // atau ambil user sesuai kebutuhan
        return view('user.profile', compact('user'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'sim' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:6|confirmed'
        ]);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan foto jika diupload
        if ($request->hasFile('sim')) {
            // Hapus foto lama jika ada
            if ($user->photo && Storage::exists('photos/' . $user->photo)) {
                Storage::delete('photos/' . $user->photo);
            }

            $file = $request->file('sim');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('photos', $filename);
            $user->photo = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
