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
////Route::get('/', function () {
////    return view('welcome');
////});
//
//Route::get('/{url?}', function () {
//    return view('attendance_system.index');
//})->where(['url'=>'index|dashboard']);
//
////Route::get('/index', function () {
////    return view('attendance_system.index');
////});
////Route::get('/dashboard', function () {
////    return view('attendance_system.index');
////});
if(env('APP_ENV') === 'local') {
    // UI
    Route::get('/ui-buttons', function () {
        return view('demo.ui-buttons');
    });
    Route::get('/ui-alerts', function () {
        return view('demo.ui-alerts');
    });
    Route::get('/ui-badge', function () {
        return view('demo.ui-badge');
    });
    Route::get('/ui-cards', function () {
        return view('demo.ui-cards');
    });
    Route::get('/ui-carousel', function () {
        return view('demo.ui-carousel');
    });
    Route::get('/ui-dropdowns', function () {
        return view('demo.ui-dropdowns');
    });
    Route::get('/ui-grid', function () {
        return view('demo.ui-grid');
    });
    Route::get('/ui-images', function () {
        return view('demo.ui-images');
    });
    Route::get('/ui-lightbox', function () {
        return view('demo.ui-lightbox');
    });
    Route::get('/ui-modals', function () {
        return view('demo.ui-modals');
    });
    Route::get('/ui-pagination', function () {
        return view('demo.ui-pagination');
    });
    Route::get('/ui-popover-tooltips', function () {
        return view('demo.ui-popover-tooltips');
    });
    Route::get('/ui-rangeslider', function () {
        return view('demo.rangeslider');
    });
    Route::get('/ui-session-timeout', function () {
        return view('demo.session-timeout');
    });
    Route::get('/ui-progressbars', function () {
        return view('demo.ui-progressbars');
    });
    Route::get('/ui-sweet-alert', function () {
        return view('demo.ui-sweet-alert');
    });
    Route::get('/ui-tabs-accordions', function () {
        return view('demo.ui-tabs-accordions');
    });
    Route::get('/ui-typography', function () {
        return view('demo.ui-typography');
    });
    Route::get('/ui-video', function () {
        return view('demo.ui-video');
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
