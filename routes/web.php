<?php

use App\Models\PaymentType;
use App\Models\AttributeValues;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\OrderLogsController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\OrderCasesController;
use App\Http\Controllers\PaymentTypesController;
use App\Http\Controllers\AttributeValuesController;
use App\Http\Controllers\ProductVariantsController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Permissions\RolePermissionController;
use OpenApi\scan;

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
    Route::get('/productsShow/{id}',[ProductController::class,'show'])->name('products.show');
    
    Route::get('/variants', [ProductVariantsController::class, 'index']);
    Route::post('/variants', [ProductVariantsController::class, 'store'])->name('add.variants');
    Route::post('/update-variant', [ProductVariantsController::class, 'update'])->name('update.variants');
    Route::post('/delete-variant', [ProductVariantsController::class, 'destroy'])->name('delete.variant');
    // Route::get('/productsShow/{id}', [ProductVariantsController::class, 'show'])->name('variants.show');

    // Route::resource('/products',ProductController::class);
    Route::get('/attributes',[AttributeController::class, 'index']);
    Route::post('/attributes', [AttributeController::class, 'store'])->name('add.attribute');
    Route::post('/update-attribute', [AttributeController::class, 'update'])->name('update.attribute');
    Route::post('/delete-attribute', [AttributeController::class, 'destroy'])->name('delete.attribute');
    
    
    Route::get('/attributeValues', [AttributeValuesController::class, 'index']);
    Route::post('/attributeValues', [AttributeValuesController::class, 'store'])->name('add.value');
    Route::post('/update-attributeValue', [AttributeValuesController::class, 'update'])->name('update.value');
    Route::post('/delete-attributeValue', [AttributeValuesController::class, 'destroy'])->name('delete.value');

    Route::get('/paymentTypes', [PaymentTypesController::class, 'index']);
    Route::post('/paymentTypes', [PaymentTypesController::class, 'store'])->name('add.type');


    Route::get('/cases', [OrderCasesController::class, 'index']);
    Route::post('/cases', [OrderCasesController::class, 'store'])->name('add.case');
    Route::post('/update-case', [OrderCasesController::class, 'update'])->name('update.case');


    Route::get('/logs', [OrderLogsController::class, 'index']);
    Route::post('/logs', [OrderLogsController::class, 'store'])->name('add.log');

    Route::get('/orders', [OrderController::class, 'index']);   
    Route::get('/orderShow/{id}',[OrderController::class,'show'])->name('orders.show');
    Route::put('/orders/{order}/accept', [OrderController::class, 'accept'])->name('orders.accept');
    Route::put('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');


    Route::get('/stock',[StockController::class,'index']);
    Route::get('/products/{id}/stock-movements', [StockController::class, 'showStockMovements'])->name('showMove');
    Route::post('/updateStock/{product}', [StockController::class, 'updateStock'])->name('update.stock');
    Route::post('/stock', [StockController::class, 'store'])->name('add.stock');


    Route::get('/permissions',[PermissionController::class,'index']);
    Route::post('/permissions', [PermissionController::class,'store'])->name('permissions.store');
    Route::post('/update-permission', [PermissionController::class, 'update'])->name('permissions.update');
    Route::post('/delete-permission',[PermissionController::class, 'destroy'])->name('permissions.destroy');


    Route::get('/roles',[RoleController::class, 'index']);
    Route::post('/roles',[RoleController::class,'store'])->name('roles.store');
    Route::post('/update-role',[RoleController::class, 'update'])->name('roles.update');
    Route::post('/delete-role',[RoleController::class, 'destroy'])->name('roles.destroy');



    // // Route to display the role's permissions page:
    // Route::get('/roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
    // //  assign permissions to a role:
    // Route::post('/assignPermissions', [RolePermissionController::class, 'store'])->name('assignPermissions.store');
    Route::get('/roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
    Route::post('/assignPermissions', [RolePermissionController::class, 'store'])->name('assignPermissions.store');
     // Route::get('/assignPermission',[RolePermissionController::class, 'create']);
    // Route::post('/assignPermission',[RolePermissionController::class,'store']);
    



});




Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth','role:admin'])->name('admin.index');


Route::get('/' ,[PagesController::class,'index']);

Route::resource('/cart',CartController::class);
// Route::get('/product/{id}/products' ,[ProductController::class,'show'])->name('products.show');

Route::get('checkout',[CheckoutController::class,'create'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'store']);



require __DIR__.'/auth.php';