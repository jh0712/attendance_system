<?php

use Illuminate\Support\Facades\Route;
use Modules\RollCall\Http\Controllers\RollCallController;

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

Route::group([], function () {
    // Route::resource('roll_call', RollCallController::class)->names('roll_call');
    // index
    Route::get('roll_call', [RollCallController::class, 'index'])->name('roll_call.index');
    // create
    Route::get('roll_call/create/{course_id}/{course_detail_id}', [RollCallController::class, 'create'])->name('roll_call.create');
    // store
    Route::post('roll_call/{course_id}/{course_detail_id}', [RollCallController::class, 'store'])->name('roll_call.store');
    // edit
    Route::get('roll_call/edit/{course_id}/{course_detail_id}', [RollCallController::class, 'edit'])->name('roll_call.edit');
    // update
    Route::put('roll_call/{course_id}/{course_detail_id}', [RollCallController::class, 'update'])->name('roll_call.update');
});
