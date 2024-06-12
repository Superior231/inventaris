<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'slug' => 'laptop',
            'category_name' => 'Laptop',
            'description' => 'Ini adalah deskripsi Laptop'
        ]);

        Category::create([
            'slug' => 'buku',
            'category_name' => 'Buku',
            'description' => 'Ini adalah deskripsi Buku'
        ]);
    }
}
