<?php

Route::group(['module' => 'Province', 'middleware' => ['api'], 'namespace' => 'App\Modules\Province\Controllers'], function() {

    Route::resource('Province', 'ProvinceController');

});
