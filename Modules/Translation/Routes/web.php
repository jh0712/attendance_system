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


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('translations', 'Admin\TranslationsController', ['names' => 'admin.translations', 'only' => ['index', 'update']]);

    Route::get('match-translation', ['as' => 'match.old.translation', 'uses' => 'Admin\TestController@index']);
});

Route::any('/lang/{locale}', function ($locale = null) {
    session()->put('locale', $locale);

    return back();
})->middleware('web');
