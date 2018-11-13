<?php

Route::group(['module' => 'EducationLevel', 'middleware' => ['web'], 'namespace' => 'App\Modules\EducationLevel\Controllers'], function() {

    Route::resource('EducationLevel', 'EducationLevelController');

});
