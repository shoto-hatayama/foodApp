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

Route::get('/', 'foodController@index');
Route::post('/store','foodController@store');
Route::get('/edit/{id?}','foodCOntroller@edit',['id' => "{id}"]);

