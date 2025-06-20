<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Http\Middleware\PreventBackHistory;
use App\Models\Pesanan;

class UserController extends Controller
{
    // untuk mencegah methods biar tidak bisa diakses tanpa login
    // kecuali method login dan logout
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'register']);
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required',
            'terms' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);

    
    return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan login untuk melanjutkan.');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari pengguna berdasarkan email ada atau tidak di db
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email salah atau tidak terdaftar',
            ])->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->access_level === 0) {
                return redirect()->intended(route('admin.dashboard'));
            }
            // Autentikasi berhasil, redirect ke halaman utama
            return redirect()->intended(route('user.index'));
        }
        // Autentikasi gagal, password salah
        return back()->withErrors([
            'login' => 'Password salah',
        ])->withInput();
    }

    

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function home(){
        return redirect()->route('user.index');
    }

    public function history(){
        $user = Auth::user();

        $pesanans = Pesanan::with(['user', 'postingan'])
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
        return view('user.history', compact('pesanans'));    
    }

    public function showhistoryDetail($id){
        $pesanan = Pesanan::with(['user', 'postingan'])->findOrFail($id);
        return view('user.history-detail', compact('pesanan'));
    }

    public function showPaymentForm($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('payment.payment', compact('pesanan'));
    }

    public function submitPayment(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        if ($pesanan->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'payment_method' => 'required|string',
            'payment_proof' => 'required|image|max:2048',
        ]);

        $proofPath = $request->file('payment_proof')->store('bukti-pembayaran', 'public');

        $pesanan->payment_method = $request->payment_method;
        $pesanan->payment_proof = $proofPath;
        $pesanan->status = 'Menunggu Konfirmasi Pembayaran';
        $pesanan->save();

        return redirect()->route('user.history')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }


    public function submitUpgrade(Request $request){
    $request->validate([
        'nik' => 'required|string|max:20|unique:owners,nik',
        'phone' => 'required|string|max:15|unique:owners,phone',
        'address' => 'required|string|max:255',
        'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'sim' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'stnk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $user = Auth::user();

    // cek apakah sudah pernah jadi owner
    if ($user->owner) {
        return back()->with('info', 'Kamu sudah terdaftar sebagai owner.');
    }
    
    // upload file
    $ktp = $request->file('ktp')->store('dokumen/ktp', 'public');
    $sim = $request->file('sim')->store('dokumen/sim', 'public');
    $stnk = $request->file('stnk')->store('dokumen/stnk', 'public');

    // simpan ke tabel owners
    Owner::create([
        'user_id' => $user->id,
        'nik' => $request->nik,
        'phone' => $request->phone,
        'address' => $request->address,
        'ktp' => $ktp,
        'sim' => $sim,
        'stnk' => $stnk,
    ]);

    return redirect()->route('user.index')->with('success', 'Permintaan upgrade dikirim.');
    }

    public function selesaikanPeminjaman($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        if ($pesanan->status !== 'Peminjaman Berlangsung') {
            return redirect()->back()->with('error', 'Pesanan belum dapat diselesaikan.');
        }

        $pesanan->status = 'Selesai';
        $pesanan->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil diselesaikan.');
    }



}
