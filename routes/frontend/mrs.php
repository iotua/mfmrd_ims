<?php

//Route::group(['middleware' => 'auth'], function () {
    //Route::group([
        //'middleware' => 'role:mrs',
        //'namespace' => 'mrs',
        //'as' => 'mrs.',
      //  'prefix' => 'mrs'
    //], function () {
        Route::resource('mrs/in','Mrs\MrsController');
        Route::post('mrs/in/update', 'Mrs\MrsController@update')->name('mrs.update');
        Route::get('mrs/in/destroy/{id}', 'Mrs\MrsController@destroy')->name('mrs.destroy');

  //  });
//});