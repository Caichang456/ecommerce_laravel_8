<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile_phone',
        'address',
        'date_of_birth',
        'password',
        'gender',
        'email'
    ];
}
