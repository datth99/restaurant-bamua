<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'content',
        'payment_type',
        'status'
    ];

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }
}
