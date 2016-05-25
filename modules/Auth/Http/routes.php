<?php

Route::group(['prefix' => '/', 'namespace' => 'Modules\Auth\Http\Controllers'], function()
{
	Route::get('/', 'AuthController@index');
    Route::get('/auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);
    Route::get('/auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@index']);
    Route::post('/auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);

    Route::resource('auth/permission', 'PermissionController');
    Route::resource('auth/role', 'RoleController');
    Route::resource('auth/user', 'UserController');
    Route::get('/auth/user/reset-password/{token}', ['as' => 'user.reset-password', 'uses' => 'AuthController@getResetPassword']);
    Route::post('/auth/user/{user}/reset-password', ['as' => 'user.reset-password', 'uses' => 'AuthController@postResetPassword']);
    
    Route::post('/auth/user/change-password', ['as' => 'user.change-password', 'uses' => 'UserController@changePassword']);
});