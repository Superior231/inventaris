<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CategoryIndex extends Component
{
    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Kategori',
        'active' => 'kategori'
    ])]


    public function delete($id)
    {
        Category::find($id)->delete();

        session()->flash('success', 'Kategori berhasil dihapus!');
        return $this->redirectRoute('admin.kategori');
    }


    public function render()
    {
        return view('livewire.admin.category.category-index', [
            'categories' => Category::withCount('products')->get()
        ]);
    }
}
