<?php

Route::resource('travel','Travel\TravelController');
Route::post('travel/update', 'Travel\TravelController@update')->name('sick.update');
Route::get('travel/destroy/{id}', 'Travel\TravelController@destroy')->name('sick.destroy');
Route::get('travel/create/{id}', [
    'as' => 'travel.create',
    'uses' => 'Travel\TravelController@create'
]);