<?php

namespace App\Livewire\Admin\Category;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CategoryIndex extends Component
{
    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Kategori'
    ])]

    
    public function render()
    {
        return view('livewire.admin.category.category-index');
    }
}
