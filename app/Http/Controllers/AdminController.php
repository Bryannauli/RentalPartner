<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\User;
use App\Models\Post;
use App\Models\Pesanan;
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
        $totalUsers = User::where('access_level', 1)->count();
        $totalOwners = Owner::where('status_verifikasi', 'approved')->count();
        $totalPosts = Post::where('status_verifikasi', 'approved')->count();
        $pendingRequests = Owner::where('status_verifikasi', 'pending')->count();
        return view('admin.dashboard', compact('recentOwners', 'totalUsers', 'totalOwners', 'totalPosts', 'pendingRequests'));
    }

    public function users()
    {
        $users = User::where('access_level', 1)->latest()->get();
        return view('admin.user', compact('users'));
    }

    // bagian tambah user
    public function createUser()
    {
        return view('components-admin.tambahuser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
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

    public function owner()
    {
        $owners = Owner::with('user')->where('status_verifikasi', 'approved')->latest()->get();
        return view('admin.ownerinfo', compact('owners'));
    }

    public function mobil()
    {
        return view('admin.mobil');
    }

    public function posts()
    {
        $posts = Post::with('owner')->orderBy('created_at', 'desc')->get();
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
    public function ownerRequests()
    {
        $owners = Owner::with('user')->latest()->get();
        return view('admin.owner', compact('owners'));
    }
    // Approve dan tolak permintaan owner
    public function approveOwner($id)
    {
        $owner = Owner::findOrFail($id);
        $user = User::findOrFail($owner->user_id);
        $owner->status_verifikasi = 'approved';
        $user->access_level = 2;
        $user->save();
        $owner->save();
        return redirect()->back()->with('success', 'Owner request approved successfully.');
    }
    public function rejectOwner($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->status_verifikasi = 'rejected';
        $owner->save();
        return redirect()->back()->with('success', 'Owner request rejected successfully.');
    }
    // Aktifkan dan Tangguhkan akun owner
    public function activateOwner($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->status = 'active';
        $owner->save();
        return redirect()->back()->with('success', 'Owner berhasil diaktifkan kembali.');
    }
    public function suspendOwner($id)
    {
        $owner = Owner::findOrFail($id);
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

}
