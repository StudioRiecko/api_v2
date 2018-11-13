<?php 

$route_data = [
    'module' => 'User',
    'prefix' => 'users',
    'middleware' => ['api', 'auth:api'],
    'namespace' => 'App\Modules\User\Controllers',
];

Route::group($route_data, function () {
    Route::get('/me', 'UserMeController@show')->name('users.me');
  
});