<?php


    Route::group(['prefix' => '/' , 'middleware' => 'auth'], function() {
        Route::get('dashboard','DashboardController@index')->name('dashboard');

        Route::resource('company', 'Admin\CompanyController')->except(['show','create','destroy']);

        Route::delete('company','Admin\CompanyController@destroy')->name('company.destroy');


        Route::resource('employee','Admin\EmployeeController')->except(['create','show','edit']);
    });


?>
