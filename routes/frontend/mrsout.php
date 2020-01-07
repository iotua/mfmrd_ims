<?php

//Route::group(['middleware' => 'auth'], function () {
    //Route::group([
        //'middleware' => 'role:mrs',
        //'namespace' => 'mrs',
        //'as' => 'mrs.',
      //  'prefix' => 'mrs'
    //], function () {
        Route::resource('mrs/out','Mrs\MrsoutController');
        Route::post('mrs/out/update', 'Mrs\MrsoutController@update')->name('out.update');
        Route::get('mrs/out/destroy/{id}', 'Mrs\MrsoutController@destroy')->name('mrs.destroy');

  //  });
//});