<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StartController@index');
Route::get('dashboard', 'DashboardController@dashboard');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('register/university', 'RegisterController@showRegister');
Route::post('register/university', 'RegisterController@register');

Route::group(['prefix' => 'modules'], function() {
    Route::get('/', 'ModulesController@index');
    Route::get('create', 'ModulesController@create');
    Route::post('create', 'ModulesController@store');
    Route::get('show/{id}', 'ModulesController@show');
    Route::get('edit/{id}', 'ModulesController@edit');
    Route::post('update/{id}', 'ModulesController@update');
    Route::get('delete/{id}', 'ModulesController@destroy');
});

Route::group(['prefix' => 'professors'], function() {
    Route::get('/', 'ProfessorsController@index');
    Route::get('create', 'ProfessorsController@create');
    Route::post('create', 'ProfessorsController@store');
});

Route::group(['prefix' => 'students'], function() {
    Route::get('/', 'StudentsController@index');
    Route::get('create', 'StudentsController@create');
    Route::post('create', 'StudentsController@store');
});

Route::group(['prefix' => 'teams'], function() {
    Route::get('/', 'StudentTeamsController@index');
    Route::get('create', 'StudentTeamsController@create');
    Route::post('create', 'StudentTeamsController@store');
});