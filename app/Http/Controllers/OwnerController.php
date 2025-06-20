<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Pesanan;
use App\Models\Review;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard(){
        $user = Auth::user();
        $owner = $user->owner;

        if ($owner && $owner->status === 'suspended') {
            return redirect()->route('user.index')->with('error', 'Akun Owner Anda ditangguhkan.');
        }

        $posts= Post::where('owner_id', $owner->id)
        ->where('status_verifikasi', 'approved')
        ->get();
        return view('owner.dashboard', compact('posts'));
    }

    public function riwayat(){
        $owner = Auth::user()->owner;
        $pesanans = Pesanan::with(['user', 'postingan'])
                    ->where('owner_id', $owner->id)
                    ->where('status', 'Selesai') 
                    ->orderBy('updated_at', 'desc')
                    ->get();
        return view('owner.riwayat', compact('pesanans'));    
    }

    
    public function order(){
        $owner = Auth::user()->owner;

        $pesanans = Pesanan::with(['user', 'postingan'])
                    ->where('owner_id', $owner->id)
                    ->where('status', '!=', 'Selesai') 
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('owner.order', compact('pesanans'));    
    }

    public function konfirmasiPesanan(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        if ($request->action === 'accept') {
            // konfirmasi, ubah status
            $pesanan->status = 'Menunggu Pembayaran';
            $pesanan->save();

            return redirect()->back()->with('success', 'Pesanan telah dikonfirmasi.');
        }

        if ($request->action === 'reject') {
            // tolak, ubah status dan simpan alasan
            $pesanan->status = 'Dibatalkan';
            $pesanan->rejection_reason = $request->rejection_reason;
            $pesanan->save();

            return redirect()->back()->with('success', 'Pesanan ditolak.');
        }

        return redirect()->back()->with('error', 'Aksi tidak valid.');
    }

    public function konfirmasiPembayaran($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        
        if ($pesanan->status === 'Menunggu Konfirmasi Pembayaran') {
            $pesanan->status = 'Peminjaman Berlangsung';
            $pesanan->save();

            return back()->with('success', 'Pembayaran telah dikonfirmasi. Peminjaman dimulai.');
        }

        return back()->with('error', 'Status pesanan tidak valid untuk konfirmasi pembayaran.');
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
        $path = $request->file('photo')->store('photos', 'public');
        $post->photo = $path; 
        }
        $post->save();

        return redirect()->route('owner.postingan')->with('success', 'Postingan mobil berhasil dibuat!');
    }

    public function editPost($id)
    {
        $owner = Auth::user()->owner;
        $post = Post::where('id', $id)->where('owner_id', $owner->id)->firstOrFail();

        return view('components-owner.editpost', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
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

        $post = Post::where('id', $id)->where('owner_id', $owner->id)->firstOrFail();

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

        // update foto kalau diunggah ulang
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('public/photos', $filename);
            $post->photo = $filename;
        }

        // ubah status jadi pending agar harus di-approve ulang
        $post->status_verifikasi = 'pending';
        
        $post->save();

        return redirect()->route('owner.postingan')->with('success', 'Data mobil berhasil diperbarui dan menunggu persetujuan ulang.');
    }

    public function showPost(){
        $user = Auth::user();
        $owner = $user->owner;
        $posts= Post::where('owner_id', $owner->id)->get();
        return view('owner.postingan', compact('posts'));
    }

    public function daftarReview()
    {
        $owner = Auth::user()->owner;

        $reviews = Review::with(['user', 'post'])
                    ->whereHas('post', function ($query) use ($owner) {
                        $query->where('owner_id', $owner->id);
                    })
                    ->latest()
                    ->get();

        return view('owner.review', compact('reviews'));
    }


}
