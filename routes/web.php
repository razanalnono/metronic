<?php

use App\Models\AttributeValues;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\AttributeValuesController;
use App\Http\Controllers\ProductVariantsController;
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


Route::middleware('auth')->group(function (){
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/category', [CategoryController::class, 'store'])->name('add.category');
    Route::post('/update-category', [CategoryController::class, 'update'])->name('update.category');
    Route::post('/delete-category', [CategoryController::class, 'destroy'])->name('delete.category');
    
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::post('/update-product', [ProductController::class, 'update'])->name('update.product');
    Route::post('/delete-product', [ProductController::class, 'destroy'])->name('delete.product');
    Route::delete('/products/{id}/force', [ProductController::class, 'forceDelete'])->name('forceDelete');
    Route::get('/trashed',[ProductController::class,'trash'])->name('trash');
    Route::put('/restore/{product}/restore',[ProductController::class, 'restore'])->name('restore');
    Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
    
    Route::get('/variants', [ProductVariantsController::class, 'index']);
    Route::post('/variants', [ProductVariantsController::class, 'store'])->name('add.variants');
    Route::post('/update-variant', [ProductVariantsController::class, 'update'])->name('update.variants');
    Route::post('/delete-variant', [ProductVariantsController::class, 'destroy'])->name('delete.variant');
    // Route::resource('/products',ProductController::class);
    Route::get('/attributes',[AttributeController::class, 'index']);
    Route::post('/attributes', [AttributeController::class, 'store'])->name('add.attribute');
    Route::post('/update-attribute', [AttributeController::class, 'update'])->name('update.attribute');
    Route::post('/delete-attribute', [AttributeController::class, 'destroy'])->name('delete.attribute');
    
    
    Route::get('/attributeValues', [AttributeValuesController::class, 'index']);
    Route::post('/attributeValues', [AttributeValuesController::class, 'store'])->name('add.value');
    Route::post('/update-attributeValue', [AttributeValuesController::class, 'update'])->name('update.value');
    Route::post('/delete-attributeValue', [AttributeValuesController::class, 'destroy'])->name('delete.value');
    
    
});




Route::get('/' ,[PagesController::class,'index']);

Route::resource('/cart',CartController::class);
Route::get('/product/{id}/products' ,[ProductController::class,'show'])->name('products.show');

Route::get('checkout',[CheckoutController::class,'create'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'store']);



require __DIR__.'/auth.php';