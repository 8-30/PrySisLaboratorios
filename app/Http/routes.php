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

Route::get('/', 'WelcomeController@index');
Route::get('test', function(){
	return 'PROBANDO PROBANDO MI AMOR POR TI';
 });

Route::get('home', 'HomeController@index');

Route::post('empresa/store', 'empresaController@store');
Route::post('empresa/search', 'empresaController@store');
Route::post('empresa/update', 'empresaController@update');
Route::get('empresa/edit/{id}','empresaController@edit');
Route::get('empresa/destroy/{id}','empresaController@destroy');
Route::resource('empresa','empresaController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
