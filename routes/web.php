<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' ,[PagesController::class,'index']);
// Route::get('/login',[AuthenticatedSessionController::class,'create']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/category', [CategoryController::class, 'store'])->name('add.category');
Route::post('/update-category', [CategoryController::class, 'update'])->name('update.category');
Route::post('/delete-category', [CategoryController::class, 'destroy'])->name('delete.category');

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store'])->name('add.product');
Route::post('/update-product', [ProductController::class, 'update'])->name('update.product');
Route::post('/delete-product', [ProductController::class, 'destroy'])->name('delete.product');
Route::post('/products/{id}/force', [ProductController::class, 'forceDelete'])->name('forceDelete');
Route::get('/trashed',[ProductController::class,'trash'])->name('trash');

Route::put('/restore/{product}/restore',[ProductController::class, 'restore'])->name('restore');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);


require __DIR__.'/auth.php';