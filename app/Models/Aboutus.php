<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;

    protected $table = 'aboutus';
    protected $fillable = [
        'description',
        'address',
        'email',
        'phone',
        'openH',
        'thumb',
        'map'
    ];
}
