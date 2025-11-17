<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('karyawans', KaryawanController::class);
Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');
Route::get('/gaji/{id}', [GajiController::class, 'hitung'])->name('gaji.hitung');
Route::post('/gaji/{id}/proses', [GajiController::class, 'proses'])->name('gaji.proses');;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('absensi', AbsensiController::class);
Route::get('/absensi/scan', [AbsensiController::class, 'scan'])->name('absensi.scan');
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');

