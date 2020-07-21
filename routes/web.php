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

// RESTFUL CONTROLLER STANDRED //
//  Verb         URI                        Action               RouteName
//  GET             /photos                 index               photos.index
//  GET             /photos/create	        create	            photos.create
//  POST    	    /photos	                store	            photos.store
//  GET     	    /photos/{photo}	        show	            photos.show
//  GET     	    /photos/{photo}/edit    edit                photos.edit
//  PUT/PATCH	    /photos/{photo}	        update              photos.update
//  DELETE   	    /photos/{photo}	        destroy	            photos.destroy

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/books', 'BooksController@index')->name('books.index');
Route::get('/books/create', 'BooksController@create')->name('books.create');
Route::post('/books', 'BooksController@store')->name('books.store');
Route::get('/books/{book}', 'BooksController@show')->name('books.show');
Route::get('/books/{book}/edit', 'BooksController@edit')->name('books.edit');
Route::put('/books/{book}', 'BooksController@update')->name('books.update');//PUT,PATCH
Route::delete('/books/{book}', 'BooksController@destroy')->name('books.destroy');//Delete









