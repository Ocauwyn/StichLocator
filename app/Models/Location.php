<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'telepon','rating', 'reviews', 'status', 'image_url', 'lat', 'lng', 'opening_hours'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'location_id');
    }

}
