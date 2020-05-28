<?php

Route::resource('maternity','Mleave\MleaveController');
Route::post('maternity/update', 'Mleave\MleaveController@update')->name('maternity.update');
Route::get('maternity/destroy/{id}', 'Mleave\MleaveController@destroy')->name('maternity.destroy');
Route::get('maternity/create/{id}', [
    'as' => 'maternity.create',
    'uses' => 'Mleave\MleaveController@create'
]);