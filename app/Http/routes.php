<?php

Route::get('/', 'StartController@index');
Route::get('dashboard', 'DashboardController@dashboard');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('register/university', 'RegisterController@showRegister');
Route::post('register/university', 'RegisterController@register');

Route::get('user/profile', 'UsersController@show');
Route::get('user/get/profile', 'UsersController@profile');

Route::group(['prefix' => 'modules'], function() {
    Route::get('/', 'ModulesController@index');
    Route::get('all', 'ModulesController@all');

    Route::post('store', 'ModulesController@store');
    Route::post('course', 'ModulesController@storeCourse');
    Route::delete('course', 'ModulesController@deleteCourse');

    Route::post('update/{id}', 'ModulesController@update');
});

Route::group(['prefix' => 'professors'], function() {
    Route::get('/', 'ProfessorsController@index');
    Route::get('all', 'ProfessorsController@all');
    Route::post('store', 'ProfessorsController@store');
    Route::delete('delete', 'ProfessorsController@destroy');
    Route::put('update','ProfessorsController@update');
});

Route::group(['prefix' => 'students'], function() {
    Route::get('/', 'StudentsController@index');
    Route::get('all', 'StudentsController@all');
    Route::post('store', 'StudentsController@store');
    Route::delete('delete', 'StudentsController@destroy');
    Route::put('update','StudentsController@update');
});

Route::group(['prefix' => 'teams'], function() {
    Route::get('/', 'TeamsController@index');
    Route::get('all', 'TeamsController@all');
    Route::post('store', 'TeamsController@store');
    Route::delete('delete', 'TeamsController@destroy');
    Route::put('update', 'TeamsController@update');

});