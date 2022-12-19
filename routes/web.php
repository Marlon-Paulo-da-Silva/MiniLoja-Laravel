<?php

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

// rota de query opcional, colocar o ponto de interrogação
Route::get('/empresa/{string?}', function ($string = null) {
    echo "O nome da empresa é: <br><br>";
    return $string;
});

Route::get('/', function () {
    
    return view('welcome');
});

Route::prefiz('/', function () {
    
    return view('welcome');
});

// TODO INTRO #4 13:53

Route::get('/users/{user}', function (\App\Models\User $user) {
    
    return $user;
});