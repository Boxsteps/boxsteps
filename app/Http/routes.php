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
Route::auth();

// Blank route
Route::get('/blank', 'DashboardController@blank');

// Dashboard routes
Route::get('/dashboard', 'DashboardController@index');
Route::get('/', 'DashboardController@start');

// Relation routes testing
Route::get('/user/{id}', 'UserController@show');
Route::get('/feature/{id}', 'FeatureController@show');
Route::get('/role/{id}', 'RoleController@show');
