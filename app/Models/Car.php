<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
   protected $fillable = [
    'name', 'price', 'description', 'image', 'transmission', 'seat', 'year',
    'mileage', 'baggage', 'type', 'brand', 'location'
];

}
