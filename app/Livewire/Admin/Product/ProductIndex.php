<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numberOfPaginatorsRendered = [];

    
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Produk',
        'active' => 'produk'
    ])]

    public function delete($id)
    {
        $product = Product::find($id);

        // Delete the product image from storage
        if ($product->photo) {
            Storage::delete('public/' . $product->photo);
        }

        $product->delete();

        session()->flash('success', 'Produk berhasil dihapus!');
    }
    
    public function render()
    {
        return view('livewire.admin.product.product-index', [
            'products' => Product::paginate(10)
        ]);
    }
}
