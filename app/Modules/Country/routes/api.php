<?php

Route::group(['module' => 'Country', 'middleware' => ['api'], 'namespace' => 'App\Modules\Country\Controllers'], function() {

    Route::resource('Country', 'CountryController');

});
