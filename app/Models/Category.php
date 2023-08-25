<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'small_description',
        'status',
        'popular',
        'image',
        
    ];
    public function product()
    {
        return $this->hasMany(Product::class, 'cate_id', 'id');
    }
}
