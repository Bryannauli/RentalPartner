<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function featured()
    {
        $posts = Post::all();
        return view('user.featured', compact('posts'));
    }

    public function detail($id)
    {
        $post = Post::findOrFail($id);
        return view('user.detail', compact('post'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $posts = Post::where('car_name', 'like', '%' . $query . '%')
                ->orWhere('brand', 'like', '%' . $query . '%')
                ->orWhere('type', 'like', '%' . $query . '%')
                ->orWhere('location', 'like', '%' . $query . '%')
                ->get();
        } else {
            // tampilkan semua jika tidak ada query
            $posts = Post::all();
        }

        return view('user.featured', compact('posts'));
    }
}
