<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function users() {
        return view('admin.user');
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
    
    public function ownerRequests() {
        $owners = Owner::with('user')->latest()->get();
        return view('admin.owner', compact('owners'));
    }

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

    public function showOwner($id)
    {
        $owner = Owner::with('user')->findOrFail($id);
        return view('admin.owner-detail', compact('owner'));
    }


}
