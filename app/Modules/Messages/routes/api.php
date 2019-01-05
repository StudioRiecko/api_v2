<?php
$route_data = [
    'module' => 'Messages',
    'prefix' => 'messages',
    'middleware' => ['api'],   //, 'auth:api'
    'namespace' => 'App\Modules\Messages\Controllers',
];

Route::group($route_data, function () {
    Route::get('/', 'MessagesController@index')->name('messages.index');
    Route::post('/', 'MessagesController@store')->name('messages.store');
});