<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {

    // >>> insira suas rotas aqui !!!!! <<<

    //Products
    Route::resource('/products',ProductController::class);
    /*
    Route::get('/produtos',[ProductController::class,'index'])->name('products.index');
    Route::get('/produtos/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/produtos/store',[ProductController::class,'store'])->name('products.store');
    Route::get('/produtos/{product}',[ProductController::class,'show'])->name('products.show');
    Route::get('/produtos/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
    route::put('/produtos/{product}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/produtos/{product}',[ProductController::class,'destroy'])->name('products.destroy');
    */

    //Profile
    Route::resource('/users',UserController::class);

    //inventory
    Route::resource('/inventories',InventoryController::class);
    //Route::get('/inventories',[InventoryController::class,'index'])->name('inventories.index');

    Route::get('/', [HomeController::class,'index']
    )/*->middleware('auth')*/;

    Route::get('/dashboard', [HomeController::class,'index']
    )/*->middleware(['auth'])*/->name('dashboard');

});


Route::get('/dale', function() {
    return view('dale');
});

require __DIR__.'/auth.php';
