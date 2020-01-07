<?php

Route::resource('hrms/','Hrms\HrmsController');
Route::get('hrms/retire','Hrms\HrmsController@retirestaffno');
