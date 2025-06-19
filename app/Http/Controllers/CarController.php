<?php
namespace App\Http\Controllers;

use App\Models\Post;

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

}

