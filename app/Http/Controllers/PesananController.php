<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{   
    public function form($postId)
    {
        $post = Post::findOrFail($postId);
        return view('payment.form', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'sim' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'pickup_location' => 'required',
            'return_location' => 'required',
            'postingan_id' => 'required|exists:posts,id',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $ktpPath = $request->file('ktp')->store('pesanan/ktp', 'public');
        $simPath = $request->file('sim')->store('pesanan/sim', 'public');

        $user = Auth::user();

        Pesanan::create([
            'user_id' => $user->id,
            'postingan_id' => $request->postingan_id,
            'owner_id' => $request->owner_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'ktp_path' => $ktpPath,
            'sim_path' => $simPath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'pickup_location' => $request->pickup_location,
            'return_location' => $request->return_location,
            'status' => 'Menunggu Konfirmasi Owner',
        ]);

        return redirect()->back()->with('success', 'Pemesanan berhasil dikirim!');
    }

    // tampilkan list pesanan untuk owner (dashboard owner)
    public function index()
    {
        $ownerId = Auth::user()->owner->id; 

        $pesanans = Pesanan::where('owner_id', $ownerId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('owner.pesanan.index', compact('pesanans'));
    }

    
}
