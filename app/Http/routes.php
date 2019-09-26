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

Route::get('docente', 'docenteController@index');

Route::get('docente/create', 'docenteController@create');
Route::post('docente/store', 'docenteController@store');
Route::get('docente/{id}/edit', 'docenteController@edit');
Route::post('docente/update', 'docenteController@update');
Route::post('docente/{id}/destroy', 'docenteController@destroy');




