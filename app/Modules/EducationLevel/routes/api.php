<?php

Route::group(['module' => 'EducationLevel', 'middleware' => ['api'], 'namespace' => 'App\Modules\EducationLevel\Controllers'], function() {

    Route::resource('EducationLevel', 'EducationLevelController');

});
