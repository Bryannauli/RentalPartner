<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\User;
use App\Models\Post;
use App\Models\Pesanan;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $recentOwners = Owner::with('user')->latest()->take(5)->get();

        // Data lain yang dibutuhkan dashboard
        $totalUsers = User::whereIn('access_level', [1, 2])->count();
        $totalOwners = Owner::where('status_verifikasi', 'approved')->count();
        $totalPosts = Post::where('status_verifikasi', 'approved')->count();
        $pendingRequests = Owner::where('status_verifikasi', 'pending')->count();
        $recentOwners = Owner::latest()->take(5)->get();
        $latestUser = User::where('access_level', 1)->latest()->take(5)->get();
        $latestApprovedOwners = Owner::where('status_verifikasi', 'approved')->latest()->take(5)->get();
        $latestPosts = Post::latest()->take(5)->get();
        $latestReviews = Review::latest()->take(5)->get();
        $latestBookings = Pesanan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
        'totalUsers',
        'totalOwners',
        'totalPosts',
        'pendingRequests',
        'recentOwners',
        'latestUser', // <- pastikan dikirim ke view
        'latestApprovedOwners',
        'latestPosts',
        'latestReviews',
        'latestBookings'
    ));
    }

    public function users(Request $request)
    {
        $query = User::with('owner')->whereIn('access_level', [1, 2]);

        // Filter berdasarkan kata kunci pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $users = $query->latest()->get();
        return view('admin.user', compact('users'));
    }

    // bagian tambah user
    public function createUser()
    {
        return view('components-admin.tambahuser');
    }

    // bagian store user
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => null,
        ]);

        return redirect()->route('admin.users')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function owner(Request $request)
    {
        $query = Owner::with('user')->where('status_verifikasi', 'approved');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->status;
            $query->whereHas('user', function ($q) use ($status) {
                $q->where('status', $status);
            });
        }

        $owners = $query->latest()->get();
        return view('admin.ownerinfo', compact('owners'));
    }

    // menampilkan daftar mobil
    public function mobil(Request $request)
    {
        $query = Post::query();
        
        $query->where('status_verifikasi', 'approved');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('brand', 'like', "%$search%")
                    ->orWhere('car_name', 'like', "%$search%")
                    ->orWhere('type', 'like', "%$search%");
            });
        }

        $mobil = $query->latest()->get();

        return view('admin.mobil', compact('mobil'));
    }

    // menampilkan postingan
    public function posts(Request $request)
    {
        $query = Post::with('owner.user');

        if ($request->filled('status')) {
            $query->where('status_verifikasi', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('car_name', 'like', "%$search%")
                    ->orWhere('brand', 'like', "%$search%")
                    ->orWhere('location', 'like', "%$search%");
            });
        }

        $posts = $query->latest()->get();
        return view('admin.postingan', compact('posts'));
    }

    public function review()
    {
        return view('admin.review');
    }

    public function history()
    {
        return view('admin.history');
    }

    // suspend user
    public function suspend(User $user)
    {
        $user->status = 'suspended';
        $user->save();

        // jika user adalah owner, tangguhkan owner juga
        if ($user->access_level == 2 && $user->owner) {
            $user->owner->status = 'suspended';
            $user->owner->save();
        }

        return redirect()->route('admin.users')
            ->with('success', 'Pengguna berhasil ditangguhkan.');
    }

    // aktifkan user
    public function activate(User $user)
    {
        $user->status = 'active';
        $user->save();

        return redirect()->route('admin.users')
            ->with('success', 'Pengguna berhasil diaktifkan kembali.');
    }

    // OWNER
    // Daftar permintaan owner
    public function ownerRequests(Request $request)
    {
        $query = Owner::with('user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status_verifikasi', $request->status);
        }

        $owners = $query->latest()->get();
        return view('admin.owner', compact('owners'));
    }
    // Approve dan tolak permintaan owner
    public function approveOwner(Owner $owner)
    {
        $user = User::findOrFail($owner->user_id);
        $owner->status_verifikasi = 'approved';
        $user->access_level = 2;
        $user->save();
        $owner->save();
        return redirect()->back()->with('success', 'Owner request approved successfully.');
    }
    public function rejectOwner(Owner $owner)
    {
        $owner->status_verifikasi = 'rejected';
        $owner->save();
        return redirect()->back()->with('success', 'Owner request rejected successfully.');
    }
    // Aktifkan dan Tangguhkan akun owner
    public function activateOwner(Owner $owner)
    {
        // status owner untuk bs mengakses halaman owner
        $owner->status = 'active';
        $owner->save();
        return redirect()->back()->with('success', 'Owner berhasil diaktifkan kembali.');
    }
    public function suspendOwner(Owner $owner)
    {
        $owner->status = 'suspended';
        $owner->save();
        return redirect()->back()->with('success', 'Owner berhasil ditangguhkan.');
    }
    // Detail owner
    public function showOwner($id)
    {
        $owner = Owner::with('user')->findOrFail($id);
        return view('components-admin.detailowner', compact('owner'));
    }

    // POSTINGAN
    // Detail postingan
    public function showPost($id)
    {
        $post = Post::with('owner.user')->findOrFail($id);
        return view('components-admin.detailpost', compact('post'));
    }
    // Approve dan tolak postingan
    public function approvePost($id)
    {
        $post = Post::findOrFail($id);
        $post->status_verifikasi = 'approved';
        $post->save();
        return redirect()->back()->with('success', 'Postingan berhasil disetujui.');
    }

    public function showRejectForm($id)
    {
        $post = Post::findOrFail($id);
        return view('components-admin.reject', compact('post'));
    }
    public function rejectPost(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|min:10',
        ], [
            'rejection_reason.required' => 'Alasan penolakan wajib diisi.',
            'rejection_reason.min' => 'Alasan penolakan minimal harus 10 karakter.',
        ]);

        $post = Post::findOrFail($id);

        $post->status_verifikasi = 'rejected';
        $post->rejection_reason = $request->input('rejection_reason'); // Menyimpan alasan
        $post->save();

        return redirect()->route('admin.posts')->with('success', 'Postingan berhasil ditolak.');
    }

    public function showHistory()
    {
        $pesanans = Pesanan::with(['user', 'postingan'])->latest()->get();
        return view('admin.history', compact('pesanans'));
    }

    public function showReview()
    {
        $reviews = Review::with(['user', 'post'])->latest()->get();
        return view('admin.review', compact('reviews'));
    }
}
