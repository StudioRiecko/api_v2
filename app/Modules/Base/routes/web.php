<?php

Route::group(['module' => 'Base', 'middleware' => ['web'], 'namespace' => 'App\Modules\Base\Controllers'], function() {

    Route::resource('Base', 'BaseController');

});
