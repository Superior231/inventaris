<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Livewire\Admin\Category\CategoryIndex;
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


// Admin
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('kategori', CategoryIndex::class);
});