<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Livewire\Admin\Category\CategoryCreate;
use App\Livewire\Admin\Category\CategoryEdit;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Product\ProductCreate;
use App\Livewire\Admin\Product\ProductEdit;
use App\Livewire\Admin\Product\ProductIndex;
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


Auth::routes(['register' => false]);  // register dimatikan

Route::get('/', [HomeController::class, 'index'])->name('home');

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
});