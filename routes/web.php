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

// rutas paara libros
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Libros', 'LibrosController@index')->name('libros.index');
Route::get('/Libros/create', 'LibrosController@create')->name('libros.create');
Route::post('/Libros/store', 'LibrosController@store')->name('libros.store');

Route::get('/Libros/{libro}/edit', 'LibrosController@edit')->name('libros.edit');
Route::put('/Libros/update', 'LibrosController@update')->name('libros.update');

Route::get('/Libros/{libro}}', 'LibrosController@show')->name('libros.show');
Route::delete('/Libros/{libro}}', 'LibrosController@destory')->name('libros.destory');

//rutas ppara autores 
Route::get('/Autores/create', 'AutoresController@create')->name('autores.create');

Route::resource('autores', 'AutoresController')->parameters([
    'autores' => 'autor'
]);