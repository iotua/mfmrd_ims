<?php
//Route::group(['middleware' => 'auth'], function () {
  //  Route::group([
   //     'middleware' => 'role:hrs',
        //'namespace' => 'hrs',
   //    'as' => 'hrs.',
    //    'prefix' => 'hrs'
    //], function () {
        Route::resource('hrms/stafflist','Hrs\HrsController');
        Route::post('hrms/stafflist/update', 'Hrs\HrsController@update')->name('stafflist.update');
        Route::get('hrms/stafflist/destroy/{id}', 'Hrs\HrsController@destroy')->name('stafflist.destroy');
        Route::post('hrms/stafflist/print', 'Hrs\HrsController@print')->name('stafflist.print');
   // });
//});