<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Meja;
use App\Models\Menu;

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

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::resource('/menu', \App\Http\Controllers\Api\MenuController::class);
Route::resource('/meja', \App\Http\Controllers\Api\MejaController::class);
Route::resource('/customers', \App\Http\Controllers\Api\CustomersController::class);
Route::resource('/orders', \App\Http\Controllers\Api\OrdersController::class);
Route::post('/orders/confirm/{id}', [\App\Http\Controllers\Api\OrdersController::class, 'confirm']);
Route::put('/test/{menu}', [\App\Http\Controllers\Api\MenuController::class, 'updateMenu']);
Route::get('/menu/image/{image}', [\App\Http\Controllers\Api\MenuController::class, 'showImage']);

// Route::get('/{nomorMeja}/menu', function(Request $request, $nomorMeja) {
//     $meja = Meja::where('nomor_meja', $nomorMeja)->first();
//     $menu = Menu::all();
//     if(!$meja) return response()->json([
//         'message' => 'meja not found',
//         'status' => '404',
//     ], 404);
//     return response()->json([
//         'data' => [
//             'meja' => $meja,
//             'menu' => $menu,
//         ],
//         'message' => 'success, scan qr code',
//         'status' => '200',
//     ], 200);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});
