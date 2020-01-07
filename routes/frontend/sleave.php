<?php

Route::resource('sick','Sleave\SleaveController');
Route::post('sick/update', 'Sleave\SleaveController@update')->name('sick.update');
Route::get('sick/destroy/{id}', 'Sleave\SleaveController@destroy')->name('sick.destroy');
Route::get('sick/create/{id}', [
    'as' => 'sick.create',
    'uses' => 'Sleave\SleaveController@create'
]);