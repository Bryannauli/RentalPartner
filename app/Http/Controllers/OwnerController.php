<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class OwnerController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        $owner = $user->owner;

        if ($owner && $owner->status === 'suspended') {
            return redirect()->route('user.index')->with('error', 'Akun Owner Anda ditangguhkan.');
        }
        return view('owner.dashboard');    
    }

    public function riwayat(){
        return view('owner.riwayat');    
    }
    public function order(){
        return view('owner.order');    
    }
    public function posts(){
        return view('components-owner.tambahpost');
    }
    public function storePost(Request $request){
         $validated = $request->validate([
            'car_name' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'transmission' => 'required|string|max:255',
            'facilities' => 'required|string|max:255',
            'mileage' => 'required|string|max:255',
            'baggage' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|image|max:10240',
        ]);

        $owner = Auth::user()->owner;
        if (!$owner) {
            return back()->withErrors('Akun owner tidak ditemukan.');
        }

        $post = new Post();
        $post->owner_id = $owner->id;
        $post->car_name = $validated['car_name'];
        $post->capacity = $validated['capacity'];
        $post->year = $validated['year'];
        $post->transmission = $validated['transmission'];
        $post->facilities = $validated['facilities'];
        $post->mileage = $validated['mileage'];
        $post->baggage = $validated['baggage'];
        $post->type = $validated['type'];
        $post->brand = $validated['brand'];
        $post->price = $validated['price'];
        $post->description = $validated['description'] ?? null;
        $post->location = $validated['location'];

        if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('public/photos', $filename);
        $post->photo = $filename;
    }

        $post->save();

        return redirect()->back()->with('success', 'Postingan mobil berhasil dibuat!');
    }
}
