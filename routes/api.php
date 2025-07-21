<?php

use App\Http\Controllers\API\APIController;
use App\Http\Controllers\Api\LaporanController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/kelurahan/{kecamatan}', [APIController::class, 'getKelurahan'])->name('getKelurahan');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login_user', [UserAuthController::class, 'auth']);
Route::post('/laporan_user', [LaporanController::class, 'laporan']);
Route::post('/me', [UserAuthController::class, 'me']);
