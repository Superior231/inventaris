<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'category_name',
        'description'
    ];

    public function products()
    {
        // Category boleh memiliki banyak Produk
        return $this->hasMany(Product::class);
    }
}
