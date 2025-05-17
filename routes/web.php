<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KebakaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelaksanaController;
use App\Http\Controllers\PenyelamatanController;
use App\Http\Controllers\UserController;
use App\Models\Penyelamatan;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login/store', [AuthController::class, 'loginStore'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('data')->group(function () {
        Route::resource('/user', UserController::class);

        Route::resource('/penyelamatan', PenyelamatanController::class);
        Route::get('/print/penyelamatan', [PenyelamatanController::class, 'printAll'])->name('penyelamatan.printAll');
        Route::get('/print/penyelamatan/{penyelamatan}', [PenyelamatanController::class, 'print'])->name('penyelamatan.print');

        Route::resource('/kebakaran', KebakaranController::class);
        Route::get('/print/kebakaran/{kebakaran}', [KebakaranController::class, 'print'])->name('kebakaran.print');
        Route::post('/kebakaran/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
    });

    Route::prefix('laporan')->group(function () {
        Route::get('/kebakaran', [LaporanController::class, 'laporanKebakaran'])->name('laporan.kebakaran');

        Route::get('/penyelamatan', [LaporanController::class, 'laporanPenyelamatan'])->name('laporan.penyelamatan');
        Route::post('/penyelamatan/cetak_laporan', [LaporanController::class, 'laporanPenyelamatanByDate'])->name('laporan.penyelamatanByDate');
    });
});
