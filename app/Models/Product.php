<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'slug',
        'product_name',
        'category_id',
        'stock',
        'purchase_price',
        'selling_price',
        'description',
        'photo'
    ];
    
    public function category()
    {
        // Product hanya boleh memiliki 1 kategory
        return $this->belongsTo(Category::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
