<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::prefix('v1')->group(function () {

    Route::get('petshop_products', [ProductController::class, 'getAllProducts']);
    Route::get('petshop_products/{id}', [ProductController::class, 'getProductByID']);
    Route::post('petshop_products', [ProductController::class, 'createNewProduct']);
    Route::put('petshop_products/{id}', [ProductController::class, 'updateProductDetails']);
    Route::delete('petshop_products/{id}', [ProductController::class, 'removeProduct']);
});

