<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'UserController@index')->name('users');
Route::get('/$id', 'UserController@show')->name('users.show');
Route::get('/create', 'UserController@create')->name('users.create');
Route::post('/', 'UserController@store')->name('users.store');
Route::get('/{id}/edit', 'UserController@edit')->name('users.edit');
Route::put('/{id}', 'UserController@update')->name('users.update');
Route::get('/{id}', 'UserController@destroy')->name('users.destroy');
