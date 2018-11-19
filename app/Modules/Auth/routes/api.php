<?php

$route_data = [
    'module' => 'Auth',
    'prefix' => 'auth',
    'middleware' => ['api'],
    'namespace' => 'App\Modules\Auth\Controllers',
];

Route::group($route_data, function () {
    Route::post('/register', 'AuthController@store')->name('store.user');
    
});
