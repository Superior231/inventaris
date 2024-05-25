<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Dashboard',
        'active' => 'dashboard'
    ])]

    
    public function render()
    {
        $product_count = Product::count();
        $product_almost_out_stock = Product::where('stock', '<', 10)->count();
        $product_out_stock = Product::where('stock', 0)->count();
        $user_count = User::count();

        return view('livewire.admin.dashboard', [
            'product_count' => $product_count,
            'product_almost_out_stock' => $product_almost_out_stock,
            'product_out_stock' => $product_out_stock,
            'user_count' => $user_count
        ]);
    }
}
