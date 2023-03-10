<?php

use App\Http\Controllers\API\AccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\ProductController;

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


Route::post('auth/login',[AccessTokenController::class,'store'])->middleware('guest:sanctum');
Route::delete('auth/access-tokens/{token?}', [AccessTokenController::class, 'destroy'])->middleware('auth:sanctum');


Route::prefix('/dashboard')->group(function(){
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/addProduct',[ProductController::class,'store']);
});
    


Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/categories/{id}', [CategoriesController::class, 'show']);