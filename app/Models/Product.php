<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'cat_id',
        'price',
        'price_sale',
        'active', 
        'thumb',
        'active',
        'total_rating',
        'total_number'
    ]; 

    public function productCategory()
    {
        return $this->hasOne(productCategory::class, 'id', 'cat_id')
        ->withDefault(['name' => '']);
    }

    public function productComment() {
        return $this->hasMany(ProductComment::class, 'product_id', 'id');
    }
}

