<div>
    <div>
        @push('style')
            @livewireStyles()
        @endpush
    
        @push('script')
            @livewireScripts()
        @endpush
    
    
        <div class="d-flex align-items-center gap-2 mb-4">
            <a wire:navigate href="{{ route('admin.kategori') }}" class="text-decoration-none text-dark" title="Back">
                <i class='bx bx-arrow-back fs-3'></i>
            </a>
            <h3 class="text-dark fw-semibold">Edit Kategori</h3>
        </div>
        <div class="card border-0">
            <div class="card-body p-4 p-lg-5">
                <form wire:submit="save">
                    <div class="row">
                        <div class="col-12 d-flex gap-2 mb-3">
                            <div class="w-100">
                                <label for="category_name">Nama Kategori <b class="text-danger">*</b></label>
                                <input type="text" wire:model="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="Nama kategori" autocomplete="off">
                                <div class="text-danger">
                                    @error('category_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description">Deskripsi</label>
                                <textarea wire:model="description" id="description" cols="30" rows="3" class="form-control"></textarea>
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
    
</div>
