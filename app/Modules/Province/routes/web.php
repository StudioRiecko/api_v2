<?php

Route::group(['module' => 'Province', 'middleware' => ['web'], 'namespace' => 'App\Modules\Province\Controllers'], function() {

    Route::resource('Province', 'ProvinceController');

});
