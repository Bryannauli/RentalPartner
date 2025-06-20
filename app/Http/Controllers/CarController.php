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

        $allowedKategori = ['name', 'brand', 'type', 'location'];

        if (!in_array($kategori, $allowedKategori)) {
            return redirect()->back()->with('error', 'Kategori tidak valid.');
        }

        $posts = Car::where($kategori, 'like', '%' . $query . '%')->get();

        return view('user.index', [
            'posts' => $posts,
            'isSearch' => true,
            'query' => $query,
            'kategori' => $kategori,
        ]);
    }
}