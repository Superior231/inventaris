<div>
    @push('style')
        @livewireStyles()
    @endpush

    @push('script')
        @livewireScripts()
    @endpush


    <div class="title mb-4">
        <h3 class="text-dark fw-semibold">Transaksi</h3>
    </div>

    @include('components.alert')

    <div class="card border-0">
        <div class="card-body p-4 p-lg-5">
            <div class="actions d-flex align-items-center justify-content-between mb-4">
                <div class="input-group w-auto">
                    <span class="input-group-text bg-primary" id="basic-addon1"><i class='bx bx-search text-light'></i></span>
                    <input wire:model.live="search" type="search" class="form-control" placeholder="Search transaction..." aria-describedby="basic-addon1">
                </div>
                <a wire:navigate href="{{ route('staff.transaksi.tambah') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                            <tr class="align-middle">
                                <td>{{ Carbon\Carbon::parse($item->date)->translatedFormat('d F Y'); }}</td>
                                <td>#TRNS {{ $item->id }}</td>
                                <td>{{ $item->product->product_name }}</td>
                                <td>{{ number_format($item->quantity) }}</td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                                <td>Rp. {{ number_format($item->total) }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button wire:click="delete({{ $item->id }})" wire:confirm="Anda yakin?" class="btn btn-danger btn-sm p-2" title="Hapus">
                                            <i class="bx bx-x fs-6"></i> Batalkan
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
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>
