<?php

Route::group(['module' => 'City', 'middleware' => ['api'], 'namespace' => 'App\Modules\City\Controllers'], function() {

    Route::resource('City', 'CityController');

});
