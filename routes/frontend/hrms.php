<?php
//Route::group(['middleware' => 'auth'], function () {
 //   Route::group([
 //       'middleware' => 'role:hrs',
        //'namespace' => 'hrs',
  //      'as' => 'hrs.',
   //     'prefix' => 'hrs'
   // ], function () {
Route::resource('hrms/','Hrms\HrmsController');
//});
//});