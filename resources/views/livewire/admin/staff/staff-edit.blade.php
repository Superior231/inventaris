<div>
    @push('style')
        @livewireStyles()
    @endpush

    @push('script')
        @livewireScripts()
    @endpush


    <div class="d-flex align-items-center gap-2 mb-4">
        <a wire:navigate href="{{ route('admin.staff') }}" class="text-decoration-none text-dark" title="Back">
            <i class='bx bx-arrow-back fs-3'></i>
        </a>
        <h3 class="text-dark fw-semibold">Edit Staff</h3>
    </div>
    <div class="card border-0">
        <div class="card-body p-4 p-lg-5">
            <form wire:submit="save">
                <div class="row">
                    <div class="col-12 d-flex gap-2 mb-3">
                        <div class="w-100">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" autocomplete="off">
                            <div class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex gap-2 mb-3">
                        <div class="w-100">
                            <label for="email">Email</label>
                            <input type="email" wire:model="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" autocomplete="off">
                            <div class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex gap-2 mb-3">
                        <div class="w-100">
                            <label for="password">Password</label>
                            <input type="password" wire:model="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" autocomplete="off">
                            <div class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary float-end" type="submit">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
