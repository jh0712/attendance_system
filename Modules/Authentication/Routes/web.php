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
use Modules\Authentication\Http\Controllers\LoginController;
use Modules\Authentication\Http\Controllers\RegisterController;
use Modules\Authentication\Http\Controllers\LogoutController;
Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return redirect()->to('/login');
    });
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('attempt.login');
    Route::get('/register', [RegisterController::class, 'index'])->name('index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::group(['middleware' => ['auth']], function () {
        Route::any('/logout', [LogoutController::class, 'logout'])->name('logout');
    });

});
