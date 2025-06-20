<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'owner_id',
        'car_name',
        'brand',
        'type',
        'transmission',
        'capacity',
        'baggage',
        'facilities',
        'mileage',
        'year',
        'price',
        'description',
        'location',
        'status_verifikasi'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
