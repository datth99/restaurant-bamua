<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'name',
        'description',
        'content',
        'id_category',
        'active',
        'thumb',
    ];
    // protected $table = 'posts';
    // protected $primaryKey = 'id';
    // protected $guarded = [];

    public function postCategory()
    {
        return $this->hasOne(PostCategory::class, 'id', 'id_category')
        ->withDefault(['name' => '']);
    }
}
