<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_code' => 'BG-12954',
            'slug' => 'laptop-acer-aspire-5',
            'product_name' => 'Laptop Acer Aspire 5',
            'category_id' => 1,
            'stock' => 10,
            'purchase_price' => 6800000,
            'selling_price' => 7000000,
            'photo' => 'none'
        ]);
    }
}
