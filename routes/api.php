<?php

use App\Http\Controllers\Api\ApiKategoriMenuController;
use App\Http\Controllers\Api\ApiMejaController;
use App\Http\Controllers\Api\ApiMenuController;
use App\Http\Controllers\Api\ApiMenuPesanananController;
use App\Http\Controllers\Api\ApiPelangganController;
use App\Http\Controllers\Api\ApiPesananController;
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


// menu
Route::get('/menus', [ApiMenuController::class, 'index']);
Route::get('/menus/{id}', [ApiMenuController::class, 'show']);

// kategori menu
Route::get('/kategori-menus', [ApiKategoriMenuController::class, 'index']);
Route::get('/kategori-menus/{id}', [ApiKategoriMenuController::class, 'show']);

// Menu Pesanan
Route::post('/menu-pesanans', [ApiMenuPesanananController::class, 'store']);

// Pelanggan
Route::post('/pelanggan', [ApiPelangganController::class, 'store']);

// Meja
Route::put('/mejas/{nomor_meja}/update-status', [ApiMejaController::class, 'updateStatus']);

// Pesanan
Route::post('/pesanan', [ApiPesananController::class, 'store']);