<div>
    @push('style')
        @livewireStyles()
    @endpush

    @push('script')
        @livewireScripts()
    @endpush


    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="text-dark fw-semibold">Staff</h3>
        <a wire:navigate href="{{ route('admin.staff.tambah') }}" class="btn btn-primary">Tambah Staff</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center gap-2" role="alert">
            <i class='bx bxs-check-circle text-success fs-4'></i>
            <div>
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0">
        <div class="card-body p-4 p-lg-5">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $item)
                            <tr class="align-middle">
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a wire:navigate href="{{ route('admin.staff.edit', $item->id) }}" class="btn btn-primary btn-sm p-2" title="Edit">
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
        </div>
    </div>
</div>
