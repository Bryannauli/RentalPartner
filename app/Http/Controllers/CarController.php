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
