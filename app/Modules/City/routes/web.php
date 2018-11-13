<?php

Route::group(['module' => 'City', 'middleware' => ['web'], 'namespace' => 'App\Modules\City\Controllers'], function() {

    Route::resource('City', 'CityController');

});
