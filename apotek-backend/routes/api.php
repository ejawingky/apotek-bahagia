<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ObatController;
use App\Http\Controllers\Api\StokObatController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\PasienController;
use App\Http\Controllers\Api\ResepController;
use App\Http\Controllers\Api\ResepDetailController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\TransaksiDetailController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::apiResource('obat', ObatController::class);
Route::apiResource('stok-obat', StokObatController::class);
Route::apiResource('supplier', SupplierController::class);
Route::apiResource('pasien', PasienController::class);
Route::apiResource('resep', ResepController::class);
Route::apiResource('resep-detail', ResepDetailController::class);
Route::apiResource('transaksi', TransaksiController::class);
Route::apiResource('transaksi-detail', TransaksiDetailController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
  