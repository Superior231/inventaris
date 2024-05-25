<div>
    <div class="d-flex align-items-center gap-2 mb-4">
        <a wire:navigate href="{{ route('admin.produk') }}" class="text-decoration-none text-dark" title="Back">
            <i class='bx bx-arrow-back fs-3'></i>
        </a>
        <h3 class="text-dark fw-semibold">Edit Produk</h3>
    </div>
    <div class="card border-0">
        <div class="card-body p-4 p-lg-5">
            <form wire:submit="save">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="photo">Foto Produk <span class="text-secondary fs-6">(max 10mb)</span><b class="text-danger">*</b></label>
                            <input type="file" wire:model="photo" id="photo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="product_name">Nama Produk <b class="text-danger">*</b></label>
                            <input type="text" wire:model="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Masukkan nama produknya">
                            <div class="text-danger">
                                @error('product_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category_id">Kategori</label>
                            <select wire:model="category_id" id="category_id" class="form-select">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_code">Kode Produk <b class="text-danger">*</b></label>
                            <input type="text" wire:model="product_code" id="product_code" class="form-control @error('product_code') is-invalid @enderror" placeholder="Masukkan code produknya">
                            <div class="text-danger">
                                @error('product_code')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="stock">Stok <b class="text-danger">*</b></label>
                            <input type="number" wire:model="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Jumlah stok">
                            <div class="text-danger">
                                @error('stock')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="purchase_price">Harga Beli <b class="text-danger">*</b></label>
                            <input type="number" wire:model="purchase_price" id="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror" placeholder="Masukkan harga beli produk">
                            <div class="text-danger">
                                @error('purchase_price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="selling_price">Harga Jual <b class="text-danger">*</b></label>
                            <input type="number" wire:model="selling_price" id="selling_price" class="form-control @error('selling_price') is-invalid @enderror" placeholder="Masukkan harga jual produk">
                            <div class="text-danger">
                                @error('selling_price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="description">Deskripsi Produk</label>
                            <textarea wire:model="description" id="description" cols="30" rows="3" class="form-control" placeholder="Tambahkan deskripsi produk"></textarea>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
