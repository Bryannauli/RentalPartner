<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Owner;

class CarController extends Controller
{
    public function featured(Request $request)
    {
        $query = Post::where('status_verifikasi', 'approved');

        if (Auth::check() && Auth::user()->owner) {
            $ownerId = Auth::user()->owner->id;
            $query->where('owner_id', '!=', $ownerId);
        }

        // Cek mobil yang tidak sedang disewa (hanya tampilkan mobil yang tidak punya pesanan aktif)
        $query->whereDoesntHave('pesanans', function ($q) {
            $q->whereIn('status', [
                'Menunggu Konfirmasi Owner',
                'Menunggu Pembayaran',
                'Menunggu Konfirmasi Pembayaran',
                'Peminjaman Berlangsung'
            ]);
        });

        $posts = $query->latest()->get();

        return view('user.featured', compact('posts'))->with('layout', 'landing');
    }

    public function detail($id)
    {
        $post = Post::findOrFail($id);
        return view('user.detail', compact('post'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        // Ambil owner_id jika user adalah owner
        $ownerId = Auth::check() && Auth::user()->owner ? Auth::user()->owner->id : null;

        $posts = Post::where('status_verifikasi', 'approved')
            // Filter pencarian jika ada query
            ->when($searchTerm, function ($q) use ($searchTerm) {
                $q->where(function ($subQuery) use ($searchTerm) {
                    $subQuery->where('car_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('brand', 'like', '%' . $searchTerm . '%')
                        ->orWhere('type', 'like', '%' . $searchTerm . '%')
                        ->orWhere('location', 'like', '%' . $searchTerm . '%');
                });
            })
            // Exclude post milik owner yang sedang login
            ->when($ownerId, function ($q) use ($ownerId) {
                $q->where('owner_id', '!=', $ownerId);
            })
            // Hanya tampilkan mobil yang tidak sedang dipesan
            ->whereDoesntHave('pesanans', function ($q) {
                $q->whereIn('status', [
                    'Menunggu Konfirmasi Owner',
                    'Menunggu Pembayaran',
                    'Menunggu Konfirmasi Pembayaran',
                    'Peminjaman Berlangsung'
                ]);
            })
            ->latest()
            ->get();

        return view('user.featured', compact('posts'));
    }
}
