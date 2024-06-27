<?php

namespace App\Livewire\Staff;

use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\Layout;
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
        $staff_count = User::where('roles', 'Staff')->count();
    
        return view('livewire.staff.dashboard', [
            'product_count' => $product_count,
            'product_almost_out_stock' => $product_almost_out_stock,
            'product_out_stock' => $product_out_stock,
            'staff_count' => $staff_count
        ]);
    }
}
