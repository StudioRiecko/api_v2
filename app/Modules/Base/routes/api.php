<?php

Route::group(['module' => 'Base', 'middleware' => ['api'], 'namespace' => 'App\Modules\Base\Controllers'], function() {

    Route::resource('Base', 'BaseController');

});
