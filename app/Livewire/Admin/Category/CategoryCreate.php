<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryCreate extends Component
{
    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Tambah Kategori',
        'active' => 'kategori'
    ])]

    // Validate
    #[Validate('required')]
    public $category_name;

    public $slug;
    public $description;


    public function save()
    {
        $this->validate();

        Category::create([
            'slug' => Str::slug($this->category_name),
            'category_name' => $this->category_name,
            'description' => $this->description
        ]);

        session()->flash('success', 'Kategori berhasil ditambahkan!');
        return $this->redirectRoute('admin.kategori', navigate: true);
    }


    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
