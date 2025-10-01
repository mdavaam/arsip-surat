<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipSuratController;
use App\Http\Controllers\KategoriController;

// Redirect root to arsip
Route::get('/', function () {
    return redirect()->route('arsip.index');
});

// Routes untuk Arsip Surat
Route::get('/arsip', [ArsipSuratController::class, 'index'])->name('arsip.index');
Route::get('/arsip/create', [ArsipSuratController::class, 'create'])->name('arsip.create');
Route::post('/arsip', [ArsipSuratController::class, 'store'])->name('arsip.store');
Route::get('/arsip/{id}', [ArsipSuratController::class, 'show'])->name('arsip.show');
Route::get('/arsip/{id}/download', [ArsipSuratController::class, 'download'])->name('arsip.download');
Route::delete('/arsip/{id}', [ArsipSuratController::class, 'destroy'])->name('arsip.destroy');

// Routes untuk Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// Route untuk About
Route::get('/about', [ArsipSuratController::class, 'about'])->name('about');
