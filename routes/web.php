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



Route::get('/', [HomeController::class, 'index']);

Route::get('/produto', [ProductController::class, 'product']);

// admin
Route::get('/admin/produtos', [AdminProductController::class, 'index']);
Route::get('/admin/produtos/editar', [AdminProductController::class, 'edit']);

// Route::get('/users/{user}', [UserController::class, 'show']);

// Route::get('/users', [UserController::class, 'index']);