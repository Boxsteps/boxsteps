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

// Middleware web group
Route::group(['middleware' => 'web'], function () {});

// Authentication routes
Route::get('/login', 'Auth\AuthController@showLoginForm');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/logout', 'Auth\AuthController@logout');

// Registration routes
Route::get('/user/create', 'Auth\AuthController@showRegistrationForm');
Route::post('/user/create', 'Auth\AuthController@register');

// Password reset routes
Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Auth\PasswordController@reset');

// Blank route
Route::get('/blank', 'DashboardController@blank');

// Dashboard routes
Route::get('/dashboard', 'DashboardController@index');
Route::get('/', 'DashboardController@start');

// Relation routes testing
Route::get('/user/{id}', 'UserController@show');
Route::get('/feature/{id}', 'FeatureController@show');
Route::get('/role/{id}', 'RoleController@show');
