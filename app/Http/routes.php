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

Route::group(['middleware' => 'web'], function () {

    // Authentication routes
    Route::get('/login', 'Auth\AuthController@showLoginForm');
    Route::post('/login', 'Auth\AuthController@login');
    Route::get('/logout', 'Auth\AuthController@logout');

    // Registration routes
    Route::get('/register', 'Auth\AuthController@showRegistrationForm');
    Route::post('/register', 'Auth\AuthController@register');

    // Password reset routes
    Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\PasswordController@reset');

    // Dashboard route
    Route::get('/home', 'HomeController@index');

    // Relation routes testing
    Route::get('/usuario/{id}', 'UserController@show');
    Route::get('/funcionalidad/{id}', 'FeatureController@show');
    Route::get('/rol/{id}', 'RoleController@show');

    // Basic routes for Xenon theme

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/planificacion', function () {
        return view('planificacion');
    });

});
