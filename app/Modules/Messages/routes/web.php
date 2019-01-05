<?php

Route::group(['module' => 'Messages', 'middleware' => ['web'], 'namespace' => 'App\Modules\Messages\Controllers'], function() {

    Route::resource('Messages', 'MessagesController');

});
