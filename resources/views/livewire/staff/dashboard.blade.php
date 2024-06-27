<div>
    <h3 class="text-dark fw-semibold mb-5">Dashboard</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class="bx bx-box fs-2"></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Total Produk di gudang
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">{{ number_format($product_count) }}</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class="bx bx-box fs-2"></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Produk hampir habis
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">{{ number_format($product_almost_out_stock) }}</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class="bx bx-box fs-2"></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Produk Stok Habis
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">{{ number_format($product_out_stock) }}</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class="bx bx-box fs-2"></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Total Produk Terjual
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">{{ number_format($product_sold) }}</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class='bx bx-line-chart fs-2'></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Total Pendapatan Bulan Ini
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">Rp. {{ number_format($income) }}</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class='bx bx-user fs-2'></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Total Staff
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">{{ number_format($staff_count) }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>