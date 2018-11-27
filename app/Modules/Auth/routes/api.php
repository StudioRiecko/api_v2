<?php

$route_data = [
    'module' => 'Auth',
    'prefix' => 'auth',
    'middleware' => ['api'],
    'namespace' => 'App\Modules\Auth\Controllers',
];

Route::group($route_data, function () {
    Route::get('/users', 'AuthController@index')->name('index.user');
    Route::post('/login', 'AuthController@login')->name('login.user');
    Route::post('/register', 'AuthController@store')->name('store.user');
});
