<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// rota de query opcional, colocar o ponto de interrogação
// Route::get('/empresa/{string?}', function ($string = null) {
//     echo "O nome da empresa é: <br><br>";
//     return $string;
// });



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produto/{product:slug}', [ProductController::class, 'show'])->name('product');

// admin
Route::get('/admin/produtos', [AdminProductController::class, 'index'])->name('admin.products');
Route::get('/admin/produtos/criar', [AdminProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/produtos', [AdminProductController::class, 'store'])->name('admin.product.store');

Route::get('/admin/produtos/{product}/editar', [AdminProductController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin/produtos/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');

// Route::get('/users/{user}', [UserController::class, 'show']);

// Route::get('/users', [UserController::class, 'index']);