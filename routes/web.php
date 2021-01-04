<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficeController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group([
    'prefix' => 'office',
    'middleware' => 'auth',
], function () {
    Route::get('/', [OfficeController::class, 'index'])->name('office.main');
    Route::get('/list_dispatch/{user_id}', [OfficeController::class, 'list_dispatch'])->name('office.list_dispatch');
    Route::get('/list_dispatch_info/{dispatch_id}', [OfficeController::class, 'detail_dispatch_info'])->name('office.list_dispatch_info');
});

Route::group([
    'prefix' => 'profile',
    'middleware' => 'auth',
], function () {
    Route::get('/', [UserController::class, 'index'])->name('profile.index');
    Route::get('/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/update', [UserController::class, 'update'])->name('profile.update');
});







