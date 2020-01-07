<?php

Route::resource('hrms/stafflist','Hrs\HrsController');
//Route::get('hrms/stafflist/{id}','Hrs\HrsController@');
Route::post('hrms/stafflist/update', 'Hrs\HrsController@update')->name('stafflist.update');
Route::get('hrms/stafflist/destroy/{id}', 'Hrs\HrsController@destroy')->name('stafflist.destroy');
