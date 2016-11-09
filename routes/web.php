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
})->name('main');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['namespace' => 'Rbac', 'prefix' => 'rbac', 'as' => 'rbac::'], function() {

    Route::post('roles', 'RoleController@roles')->name('roles.list');
    Route::post('roles/store', 'RoleController@store')->name('roles.store');

    Route::post('permissions/store', 'PermissionController@store')->name('permissions.store');

    Route::post('roles/permissions', 'RoleController@rolesPermissions')->name('roles.permissions');
    Route::post('role/{role}/permission/{permission}', 'RoleController@updateRolePermission')->name('role.permission');

    Route::post('users/store', 'UserController@store')->name('users.store');
    Route::post('users/roles', 'UserController@usersRoles')->name('users.roles');
    Route::post('user/{user}/role/{role}', 'UserController@updateUserRole')->name('user.role');
});