<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'user_id',
        'postingan_id',
        'owner_id',
        'email',
        'phone',
        'address',
        'ktp_path',
        'sim_path',
        'start_date',
        'end_date',
        'pickup_location',
        'return_location',
        'status',
    ];

    // relasi ke user (penyewa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi ke owner (pemilik mobil)
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    // relasi ke postingan / mobil yang disewa
    public function postingan()
    {
        return $this->belongsTo(Post::class, 'postingan_id'); 
    }

    
    public function getDurationAttribute()
    {
        $start = Carbon::parse($this->start_date);
        $end = Carbon::parse($this->end_date);
    
        return $start->diffInDays($end) + 1;

    }

    public function getTotalPriceAttribute()
    {
        // pastikan relasi 'postingan' sudah dimuat (pakai with() di controller)
        $hargaPerHari = $this->postingan->price ?? 0;
        return $hargaPerHari * $this->duration;
    }
}
