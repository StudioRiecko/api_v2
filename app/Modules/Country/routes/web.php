<?php

Route::group(['module' => 'Country', 'middleware' => ['web'], 'namespace' => 'App\Modules\Country\Controllers'], function() {

    Route::resource('Country', 'CountryController');

});
