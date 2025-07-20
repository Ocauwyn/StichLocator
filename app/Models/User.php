<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'profile_picture'];

    protected $hidden = ['password', 'remember_token'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

