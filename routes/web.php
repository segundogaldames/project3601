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
Route::get('/authors/addAuthor/{nationality}','AuthorController@addAuthor')->name('authors.addAuthor');
Route::post('/authors/setAuthor/{nationality}','AuthorController@setAuthor')->name('authors.setAuthor');
Route::get('/cities/addCity/{country}','CityController@addCity')->name('cities.addCity');
Route::post('/cities/setCity/{country}','CityController@setCity')->name('cities.setCity');
Route::get('/authorRecursos/addAuthor/{recurso}','AuthorRecursoController@addAuthor')->name('authorRecursos.addAuthor');
Route::post('/authorRecursos/setAuthor/{recurso}','AuthorRecursoController@setAuthor')->name('authorRecursos.setAuthor');

Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('nationalities','NationalityController');
Route::resource('authors','AuthorController');
Route::resource('recursoTipos','RecursoTipoController');
Route::resource('countries','CountryController');
Route::resource('cities', 'CityController');
Route::resource('publishers','PublisherController');
Route::resource('tematicas','TematicaController');
Route::resource('recursos','RecursoController');
Route::resource('authorRecursos','AuthorRecursoController');
Route::resource('copiaEstados','CopiaEstadoController');
