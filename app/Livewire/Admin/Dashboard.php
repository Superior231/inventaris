<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
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
        $product_sold = Transaction::whereMonth('date', Carbon::now()->month)
                        ->whereYear('date', Carbon::now()->year)
                        ->sum('quantity');
        $income = Transaction::whereMonth('date', Carbon::now()->month)
                        ->whereYear('date', Carbon::now()->year)
                        ->sum('total');

        return view('livewire.admin.dashboard', [
            'product_count' => $product_count,
            'product_almost_out_stock' => $product_almost_out_stock,
            'product_out_stock' => $product_out_stock,
            'user_count' => $user_count,
            'product_sold' => $product_sold,
            'income' => $income
        ]);
    }
}
