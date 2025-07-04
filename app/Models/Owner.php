<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['user_id', 'nik', 'phone', 'address', 'ktp', 'sim', 'stnk', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function owner()
    {
        return $this->hasOne(Owner::class);
    }
}
