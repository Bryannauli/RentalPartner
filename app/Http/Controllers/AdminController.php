<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $recentOwners = Owner::with('user')->latest()->take(5)->get();

        // Data lain yang dibutuhkan dashboard
        $totalUsers = User::where('access_level', 1)->count();
        $totalOwners = Owner::where('status_verifikasi', 'approved')->count();
        $pendingRequests = Owner::where('status_verifikasi', 'pending')->count();
        return view('admin.dashboard', compact('recentOwners', 'totalUsers', 'totalOwners', 'pendingRequests'));
    }

    public function users() {
        $users = User::where('access_level', 1)->latest()->get(); 
        return view('admin.user', compact('users'));
    }

    public function owner() {
        $owners = Owner::with('user')->where('status_verifikasi', 'approved')->latest()->get();
        return view('admin.ownerinfo', compact('owners'));
    }

    public function mobil() {
        return view('admin.mobil');
    }

    public function posts() {
        return view('admin.postingan');
    }
    
    public function review() {
        return view('admin.review');
    }
    
    public function history() {
        return view('admin.history');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    
    // Daftar permintaan owner
    public function ownerRequests() {
        $owners = Owner::with('user')->latest()->get();
        return view('admin.owner', compact('owners'));
    }

    // Approve dan tolak permintaan owner
    public function approveOwner($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->status_verifikasi = 'approved';
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
        return view('admin.owner-detail', compact('owner'));
    }


}
