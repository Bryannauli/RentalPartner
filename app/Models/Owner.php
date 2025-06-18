<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['user_id', 'nik', 'phone', 'address', 'ktp', 'sim', 'stnk'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}   
