<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');;

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['namespace' => 'Rbac', 'prefix' => 'rbac', 'as' => 'rbac::'], function() {

    Route::post('roles', 'RoleController@roles')->name('roles.list');
    Route::post('store', 'RoleController@store')->name('roles.store');
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});
