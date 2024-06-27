<div>
    @push('style')
        @livewireStyles()
    @endpush

    @push('script')
        @livewireScripts()
    @endpush
    
    
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="text-dark fw-semibold">Kategori</h3>
        <a wire:navigate href="{{ route('admin.kategori.tambah') }}" class="btn btn-primary">Tambah Kategori</a>
    </div>

    @include('components.alert')

    <div class="card border-0">
        <div class="card-body p-4 p-lg-5">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Produk</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $item)
                            <tr class="align-middle">
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{{ $item->products_count }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a wire:navigate href="{{ route('admin.kategori.edit', [$item->slug, $item->id]) }}" class="btn btn-primary btn-sm p-2" title="Edit">
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
                                <td colspan="5" class="text-center">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>