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

    public function search(Request $request)
{
    $query = $request->input('query');
    $kategori = $request->input('kategori');

    $cars = Car::query();

    if ($query && $kategori) {
        $cars->where($kategori, 'like', '%' . $query . '%');
    }

    $cars = $cars->get();

    return view('components.featured', compact('cars', 'query', 'kategori'));
}
}

