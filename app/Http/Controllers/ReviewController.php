<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Post;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $postId)
{
    $user = Auth::user();

    // Cek apakah user pernah memesan mobil ini
    $hasOrdered = Pesanan::where('user_id', $user->id)
                    ->where('postingan_id', $postId)
                    ->whereIn('status', ['Selesai'])
                    ->exists();

    if (! $hasOrdered) {
        return redirect()->back()->with('error', 'Anda hanya dapat memberikan review jika sudah memesan mobil ini.');
    }

    // Validasi form
    $validated = $request->validate([
        'comment' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    // Simpan review
    Review::create([
        'user_id' => $user->id,
        'posts_id' => $postId,
        'comment' => $validated['comment'],
        'rating' => $validated['rating'],
    ]);
}
}