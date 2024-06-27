<div>
    @push('style')
        @livewireStyles()
    @endpush

    @push('script')
        @livewireScripts()
    @endpush


    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="text-dark fw-semibold">Produk</h3>
        <a wire:navigate href="{{ route('admin.produk.tambah') }}" class="btn btn-primary">Tambah Produk</a>
    </div>

    @include('components.alert')

    <div class="card border-0">
        <div class="card-body p-4 p-lg-5">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Kategori Produk</th>
                            <th>Qty</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $item)
                            <tr class="align-middle">
                                <td>{{ $item->product_code }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>{{ number_format($item->stock) }}</td>
                                <td>Rp. {{ number_format($item->purchase_price) }}</td>
                                <td>Rp. {{ number_format($item->selling_price) }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a wire:navigate href="{{ route('admin.produk.edit', [$item->slug, $item->id]) }}" class="btn btn-primary btn-sm p-2" title="Edit">
                                            <i class='bx bx-pencil fs-6'></i>
                                        </a>
                                        <button wire:click="delete({{ $item->id }})" wire:confirm="Anda yakin?" class="btn btn-danger btn-sm p-2" title="Hapus">
                                            <i class="bx bx-trash fs-6"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination-container d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
