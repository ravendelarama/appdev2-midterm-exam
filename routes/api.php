<?php

use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('products', ProductController::class)->only([
    'index',
    'show'
]);

Route::middleware('auth.token')->group(function () {
    Route::apiResource('products', ProductController::class)->except([
        'index',
        'show'
    ]);

    Route::controller(ProductController::class)->prefix("/products/upload")->group(function () {
        Route::post('/local', 'uploadImageLocal')->name('upload.local');

        Route::post('/public', 'uploadImagePublic')->name('upload.public');
    });
});
