<div>
    <div class="d-flex align-items-center gap-2 mb-4">
        <a wire:navigate href="{{ route('staff.transaksi') }}" class="text-decoration-none text-dark" title="Back">
            <i class='bx bx-arrow-back fs-3'></i>
        </a>
        <h3 class="text-dark fw-semibold">Tambah Transaksi</h3>
    </div>
    <div class="card border-0">
        <div class="card-body p-4 p-lg-5">
            <form wire:submit="save">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_id">Nama Produk <b class="text-danger">*</b></label>
                            <select wire:model.live="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror">
                                <option value="">Pilih Produk</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->product_name }} <i>(stok: {{ $item->stock }})</i></option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('product_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date">Tanggal Transaksi <b class="text-danger">*</b></label>
                            <input type="date" wire:model="date" id="date" class="form-control @error('date') is-invalid @enderror" required>
                            <div class="text-danger">
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="quantity">Qty</label>
                            <input wire:model.live="quantity" type="number" id="quantity" class="form-control" max="{{ $max_stock }}" min="1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="price">Harga</label>
                            <input wire:model="price" type="text" id="price" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="total">Total</label>
                            <input wire:model="total" type="text" id="total" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="notes">Catatan <b class="text-danger">*</b></label>
                            <textarea wire:model="notes" id="notes" cols="30" rows="3" class="form-control" placeholder="Tambahkan catatan..." required></textarea>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            Buat Transaksi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
