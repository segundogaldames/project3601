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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/authors/{nationality}','AuthorController@addAuthor')->name('authors.addAuthor');
Route::post('/authors/{nationality}','AuthorController@setAuthor')->name('authors.setAuthor');

Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('nationalities','NationalityController');
Route::resource('authors','AuthorController');
