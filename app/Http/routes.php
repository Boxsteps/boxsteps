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

/*
|--------------------------------------------------------------------------
| Web middleware routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'web'], function () {});

/*
|--------------------------------------------------------------------------
| Users/Auth routes
|--------------------------------------------------------------------------
*/

// Authentication routes
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Authentication Google+
Route::get('login/google', 'Auth\AuthController@redirectToProvider');
Route::get('login/google/callback', 'Auth\AuthController@handleProviderCallback');

// Password reset routes
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// User routes
Route::get('users/create', 'Auth\AuthController@showRegistrationForm');
Route::post('users/store', 'Auth\AuthController@register');

/*
|--------------------------------------------------------------------------
| Plan evaluation routes
|--------------------------------------------------------------------------
*/

Route::get('plans/{id}/evaluation', 'PlanController@editPlanEvaluation');
Route::put('plans/{id}/evaluation', 'PlanController@updatePlanEvaluation');

/*
|--------------------------------------------------------------------------
| Statistics routes
|--------------------------------------------------------------------------
*/

Route::get('statistics', 'StatisticController@index');

/*
|--------------------------------------------------------------------------
| Dashboard routes
|--------------------------------------------------------------------------
*/

// Profile routes
Route::get('profile', 'UserController@profile');

// Dashboard routes
Route::get('dashboard', 'DashboardController@dashboard');
Route::get('new', 'DashboardController@newview');
Route::get('/', 'DashboardController@start');

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::get('/api/conceptual-sections-dropdown', 'ConceptualSectionController@index');

/*
|--------------------------------------------------------------------------
| Resources routes
|--------------------------------------------------------------------------
*/

Route::resource('courses', 'CourseController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
Route::resource('evaluations', 'EvaluationController');
Route::resource('evaluations.qualifications', 'QualificationController', ['except' => ['create', 'store', 'show', 'destroy']]);
Route::resource('features', 'FeatureController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
Route::resource('messages', 'MessageController');
Route::resource('plans', 'PlanController');
Route::resource('revisions', 'RevisionController', ['except' => ['create', 'store', 'edit', 'destroy']]);
Route::resource('roles', 'RoleController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
Route::resource('users', 'UserController', ['except' => ['create', 'store']]);
