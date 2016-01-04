<?php

use Carbon\Carbon;

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
    Route::post('course/group', 'ModulesController@saveGroup');
    Route::post('course/group/event', 'ModulesController@saveEvent');
});

Route::group(['prefix' => 'professors'], function() {
    Route::get('/', 'ProfessorsController@index');
    Route::get('all', 'ProfessorsController@all');
    Route::post('store', 'ProfessorsController@store');
    Route::delete('delete', 'ProfessorsController@destroy');
    Route::put('update','ProfessorsController@update');
    Route::get('your-modules', 'ProfessorsModulesController@index');
    Route::get('your-modules/all', 'ProfessorsModulesController@all');
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
    Route::get('create', 'TeamsController@create');
    Route::post('store', 'TeamsController@store');
    Route::get('show/{id}', 'TeamsController@show');
});

Route::group(['prefix' => 'import'], function() {
    Route::get('/', 'ImportExportController@index');
    Route::post('start', 'ImportExportController@start');
});


Route::group(['prefix' => 'api'], function() {

    Route::get('/', 'DistributionServerController@time');

});

Route::get('test', function() {
    dd(Carbon::createFromFormat('d-m-Y', '01-01-2016'));
});

