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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'profile',
    'middleware' => 'auth',
], function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('profile.main');
    Route::get('/list_dispatch', [\App\Http\Controllers\UserController::class, 'list_dispatch'])->name('profile.list_dispatch');
    Route::get('/list_dispatch/{id}', [\App\Http\Controllers\UserController::class, 'detail_dispatch_info'])->name('profile.list_dispatch_info');
});


