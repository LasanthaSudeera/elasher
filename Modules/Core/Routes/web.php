<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\UserController;

Route::prefix('core')->group(function () {
    Route::get('/', 'CoreController@index')->name('core.index');
    Route::get('/show', 'CoreController@show')->name('core.show');
});

Route::prefix('user')->group(function () {
    Route::get('my-profile', [UserController::class, 'myProfile'])->name('user.profile');
});
