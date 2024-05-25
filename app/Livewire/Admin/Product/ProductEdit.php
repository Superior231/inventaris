<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;

    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Edit Produk',
        'active' => 'produk'
    ])]

    public $product_id, $product_code, $product_name, $category_id, $stock, $purchase_price, $selling_price;
    public $slug;
    public $description;
    public $photo;
    public $currentPhoto;

    protected $rules = [
        'product_code' => 'required',
        'product_name' => 'required',
        'category_id' => 'required',
        'stock' => 'required|integer',
        'purchase_price' => 'required|numeric',
        'selling_price' => 'required|numeric',
        'photo' => 'nullable|image|max:10240' // Optional photo validation
    ];

    public function mount($slug, $id)
    {
        $this->slug = $slug;
        $this->product_id = $id;
        $product = Product::where('slug', $this->slug)->where('id', $this->product_id)->firstOrFail();

        $this->product_code = $product->product_code;
        $this->product_name = $product->product_name;
        $this->category_id = $product->category_id;
        $this->stock = $product->stock;
        $this->purchase_price = $product->purchase_price;
        $this->selling_price = $product->selling_price;
        $this->description = $product->description;
        $this->currentPhoto = $product->photo;
    }

    public function save()
    {
        $this->validate();

        $product = Product::find($this->product_id);

        if (!empty($this->photo)) {
            // Delete the old photo
            if ($this->currentPhoto) {
                Storage::delete('public/' . $this->currentPhoto);
            }

            $filename = date('Y_m_d_his') . '-' . Str::slug($this->product_name) . '.jpg';
            $path = $this->photo->storeAs('public/product', $filename);

            $product->update([
                'product_code' => $this->product_code,
                'slug' => Str::slug($this->product_name),
                'product_name' => $this->product_name,
                'category_id' => $this->category_id,
                'stock' => $this->stock,
                'purchase_price' => $this->purchase_price,
                'selling_price' => $this->selling_price,
                'description' => $this->description,
                'photo' => 'product/' . $filename
            ]);
        } else {
            $product->update([
                'product_code' => $this->product_code,
                'slug' => Str::slug($this->product_name),
                'product_name' => $this->product_name,
                'category_id' => $this->category_id,
                'stock' => $this->stock,
                'purchase_price' => $this->purchase_price,
                'selling_price' => $this->selling_price,
                'description' => $this->description
            ]);
        }

        session()->flash('success', 'Produk berhasil diedit!');
        return $this->redirectRoute('admin.produk', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.product.product-edit', [
            'categories' => Category::all()
        ]);
    }
}
