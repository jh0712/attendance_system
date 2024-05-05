<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Course\Http\Controllers\CourseDetailController;
use Modules\Course\Http\Controllers\CourseMemberController;
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
    // course
    Route::resource('course', CourseController::class)->names('course');
    Route::get('course_list', 'CourseController@list')->name('course_list');

    // course detail
    Route::resource('course/{course_id}/course_detail', CourseDetailController::class)->names('course_detail');
    Route::get('course/{course_id}/course_detail_list', 'CourseDetailController@list')->name('course_detail_list');

    // course mapping member
    Route::resource('course/{course_id}/course_member', CourseMemberController::class)->names('course_member');
    Route::get('course/{course_id}/course_member_list', 'CourseMemberController@list')->name('course_member_list');
});
