<?php

use App\Livewire\Admin\Category\CategoryCreate;
use App\Livewire\Admin\Category\CategoryEdit;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Product\ProductCreate;
use App\Livewire\Admin\Product\ProductEdit;
use App\Livewire\Admin\Product\ProductIndex;
use App\Livewire\Admin\Staff\StaffCreate;
use App\Livewire\Admin\Staff\StaffEdit;
use App\Livewire\Admin\Staff\StaffIndex;
use App\Livewire\Staff\Dashboard as StaffDashboard;
use App\Livewire\Staff\Transaction\TransactionCreate;
use App\Livewire\Staff\Transaction\TransactionIndex;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes(['register' => false]);  // Register off

Route::get('/', StaffDashboard::class)->middleware('auth')->name('staff.dashboard');

//// transaction
Route::get('transaksi', TransactionIndex::class)->middleware('auth')->name('staff.transaksi');
Route::get('transaksi/tambah', TransactionCreate::class)->middleware('auth')->name('staff.transaksi.tambah');



// Admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/', Dashboard::class)->name('admin.dashboard');

    //// category
    Route::get('kategori', CategoryIndex::class)->name('admin.kategori');
    Route::get('kategori/tambah', CategoryCreate::class)->name('admin.kategori.tambah');
    Route::get('kategori/edit/{slug}/{id}', CategoryEdit::class)->name('admin.kategori.edit');

    //// product
    Route::get('produk', ProductIndex::class)->name('admin.produk');
    Route::get('produk/tambah', ProductCreate::class)->name('admin.produk.tambah');
    Route::get('produk/edit/{slug}/{id}', ProductEdit::class)->name('admin.produk.edit');

    //// staff
    Route::get('staff', StaffIndex::class)->name('admin.staff');
    Route::get('staff/tambah', StaffCreate::class)->name('admin.staff.tambah');
    Route::get('staff/edit/{id}', StaffEdit::class)->name('admin.staff.edit');
});