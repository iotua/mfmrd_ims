<?php

Route::resource('attendance','Attendance\AttendanceController');
Route::post('attendance/update', 'Attendance\AttendanceController@update')->name('attendance.update');
Route::get('attendance/destroy/{id}', 'Attendance\AttendanceController@destroy')->name('attendance.destroy');
Route::get('attendance/create/{id}', [
    'as' => 'attendance.create',
    'uses' => 'Attendance\AttendanceController@create'
]);