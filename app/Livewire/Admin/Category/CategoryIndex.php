<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numberOfPaginatorsRendered = [];

    
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
            'categories' => Category::withCount('products')->paginate(10)
        ]);
    }
}
