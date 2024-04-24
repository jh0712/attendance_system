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
//
Route::get('/', function () {
    return view('attendance_system.index');
});
//
//Route::get('/{url?}', function () {
//    return view('attendance_system.index');
//})->where(['url'=>'index|dashboard']);
//
Route::get('/index', function () {
    return view('attendance_system.index');
});
////Route::get('/dashboard', function () {
////    return view('attendance_system.index');
////});
if(env('APP_ENV') === 'local') {
    // ui
    Route::get('/ui-buttons', function () {
        return view('demo.ui-buttons');
    });
    Route::get('/ui-grid', function () {
        return view('demo.ui-grid');
    });
    // form
    Route::get('/form-elements', function () {
        return view('demo.form-elements');
    });
    Route::get('/form-validation', function () {
        return view('demo.form-validation');
    });
    Route::get('/form-advanced', function () {
        return view('demo.form-advanced');
    });
    Route::get('/form-editors', function () {
        return view('demo.form-editors');
    });
    Route::get('/form-uploads', function () {
        return view('demo.form-uploads');
    });
    Route::get('/form-xeditable', function () {
        return view('demo.form-xeditable');
    });

    // tables
    Route::get('/tables-basic', function () {
        return view('demo.tables-basic');
    });
    Route::get('/tables-datatable', function () {
        return view('demo.tables-datatable');
    });
    Route::get('/tables-responsive', function () {
        return view('demo.tables-responsive');
    });
    Route::get('/tables-editable', function () {
        return view('demo.tables-editable');
    });
}
