@extends('layouts.admin')

@section('content')
    <h3 class="text-dark fw-semibold mb-5">Dashboard</h3>
    <div class="row g-3">
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class="bx bx-box fs-2"></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Total Produk di Inventaris
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">5,020</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class="bx bx-box fs-2"></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Produk hampir habis
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">1,020</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class="bx bx-box fs-2"></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Produk Stok Habis
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">30</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class="bx bx-box fs-2"></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Total Produk Terjual
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">2,000</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class='bx bx-line-chart fs-2'></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Total Pendapatan Bulan Ini
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">Rp. 120,000,000</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <span class="icon mb-4"><i class='bx bx-user fs-2'></i></span>
                    <h6 class="fs-7 text-uppercase text-secondary fw-semibold mb-2">
                        Total User Aplikasi
                    </h6>
                    <h4 class="text-uppercase text-dark fw-semibold">21</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
