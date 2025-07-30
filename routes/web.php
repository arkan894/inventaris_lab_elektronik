<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebInventarisController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\MerkBarangController;
use App\Http\Controllers\BarangElektronikController;
use App\Http\Controllers\DashboardController;



// Web Routes
Route::get('/', [WebInventarisController::class, 'index'])->name('web.inventaris');

Route::get('/home', function () {
    return redirect()->route('dashboard');
})->name('home');

// Admin CRUD
Route::prefix('dashboard')->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('kategori', KategoriBarangController::class);
    Route::resource('merk', MerkBarangController::class);
    Route::resource('barang', BarangElektronikController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});



require __DIR__ . '/auth.php';
