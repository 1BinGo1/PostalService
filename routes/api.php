<?php

use App\Http\Controllers\Api\DispatchApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'dispatch',
], function () {
    Route::get('/', [DispatchApiController::class, 'index'])->name('api.dispatch.index');
    Route::get('/{id}', [DispatchApiController::class, 'indexById'])->name('api.dispatch.index_by_id');
    Route::post('/store', [DispatchApiController::class, 'store'])->name('api.dispatch.store');
    /*Route::get('/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('/create', [UserController::class, 'create'])->name('profile.create');
    Route::post('/store', [UserController::class, 'store'])->name('profile.store');
    Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('profile.destroy');*/
});

