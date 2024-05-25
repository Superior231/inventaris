<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Tambah Produk',
        'active' => 'produk'
    ])]

    public $product_code, $product_name, $category_id, $stock, $purchase_price, $selling_price;
    public $photo;
    public $slug;
    public $description;

    protected $rules = [
        'product_code' => 'required',
        'product_name' => 'required',
        'category_id' => 'required',
        'stock' => 'required|integer',
        'purchase_price' => 'required|numeric',
        'selling_price' => 'required|numeric',
        'photo' => 'required|image|max:10240', // max 10MB
    ];

    public function save()
    {
        $this->validate();

        // Upload Photo
        $filename = date('Y_m_d_his') . '-' . Str::slug($this->product_name) . '.jpg';
        $this->photo->storeAs('public/product', $filename);

        Product::create([
            'product_code' => $this->product_code,
            'slug' => Str::slug($this->product_name),
            'product_name' => $this->product_name,
            'category_id' => $this->category_id,
            'stock' => $this->stock,
            'purchase_price' => $this->purchase_price,
            'selling_price' => $this->selling_price,
            'description' => $this->description,
            'photo' => $this->photo->storeAs(path: 'product', name: $filename)
        ]);

        session()->flash('success', 'Produk berhasil ditambahkan!');
        return $this->redirectRoute('admin.produk');
    }

    public function render()
    {
        return view('livewire.admin.product.product-create', [
            'categories' => Category::all()
        ]);
    }
}