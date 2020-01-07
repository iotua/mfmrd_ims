<?php

Route::resource('compasionate','Cleave\CleaveController');
Route::post('compasionate/update', 'Cleave\CleaveController@update')->name('compasionate.update');
Route::get('compasionate/destroy/{id}', 'Cleave\CleaveController@destroy')->name('compasionate.destroy');
Route::get('compasionate/create/{id}', [
    'as' => 'compasionate.create',
    'uses' => 'Cleave\CleaveController@create'
]);