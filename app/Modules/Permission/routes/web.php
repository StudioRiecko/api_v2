<?php

Route::group(['module' => 'Permission', 'middleware' => ['web'], 'namespace' => 'App\Modules\Permission\Controllers'], function() {

    Route::resource('Permission', 'PermissionController');

});
