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

Route::get('/', 'FoodController@index');
Route::post('/','FoodController@index');
Route::post('/store','FoodController@store');
Route::get('/edit/{id?}','FoodCOntroller@edit',['id' => "{id}"]);
Route::post('/edit/{id?}','FoodCOntroller@edit',['id' => "{id}"]);
Route::post('/genreSearch','FoodController@genreSearch');

