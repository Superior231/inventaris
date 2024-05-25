<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryEdit extends Component
{
    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Edit Kategori',
        'active' => 'kategori'
    ])]

    // Validate
    #[Validate('required')]
    public $category_name;

    public $slug;
    public $category_id;
    public $description;

    public function mount($slug, $id)
    {
        $this->slug = $slug;
        $this->category_id = $id;
        $category = Category::where('slug', $this->slug)->where('id', $this->category_id)->firstOrFail();

        $this->category_name = $category->category_name;
        $this->description = $category->description;
    }

    public function save()
    {
        $this->validate();
        $category = Category::where('slug', $this->slug)->where('id', $this->category_id)->firstOrFail();

        $category->update([
            'slug' => Str::slug($this->category_name),
            'category_name' => $this->category_name,
            'description' => $this->description
        ]);

        session()->flash('success', 'Kategori berhasil diedit!');
        return $this->redirectRoute('admin.kategori', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.category.category-edit');
    }
}
