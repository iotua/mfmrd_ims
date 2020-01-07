<?php

Route::resource('leave','Leave\LeaveController');
Route::post('Leave/update', 'Leave\LeaveController@update')->name('Leave.update');
Route::get('Leave/destroy/{id}', 'Leave\LeaveController@destroy')->name('Leave.destroy');
Route::get('leave/create/{id}', [
    'as' => 'leave.create',
    'uses' => 'Leave\LeaveController@create'
]);
