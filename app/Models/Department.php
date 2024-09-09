<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_profile',
        'name',
        'address',
        'phone_number',
        'latitude',
        'longitude ',
    ];
}
