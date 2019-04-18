<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/posts','CrudsController');
Route::resource('/csc','CountriesController');
Route::resource('/state','StatesController');
Route::resource('/city','CitiesController');
Route::post('/csc/index','CitiesController@getState');
Route::resource('/emp','EmployeesController')->middleware('user');
Route::get('/get_emp/{id}','CitiesController@getEmp');
Route::post('/cha','CrudsController@insertImg');
Route::resource('/products','ProductsController')->middleware('user');
Route::resource('/options','OptionsController');
Route::get('/get-prod-color/{id}','OptionsController@getProdColor');
Route::resource('/ratings','RatingsController');
Route::resource('/comments','CommentsController');
Route::get('/getProdLth','OptionsController@getProdLth');
Route::get('/getProdHtl','OptionsController@getProdHtl');
Route::get('/getProdR1','OptionsController@getProdR1');
Route::get('/getProdR2','OptionsController@getProdR2');
Route::get('/getProdR3','OptionsController@getProdR3');
Route::get('/getProdR4','OptionsController@getProdR4');

// Route::group(['middleware' => 'use.ssl'], function () 
// {
//     Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
//     Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
// });

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/unauthorized', function () {
    return view('unauthorized');
});