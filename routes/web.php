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

Route::resource('books', 'BookController');

// Verb	     |  URI	                  |  Action	     |   Route Name
//-----------|------------------------|--------------|---------------------
// GET	     |  /books                |  index	     |  books.index
// GET	     |  /books/create	      |  create	     |  books.create
// POST	     |  /books                |  store	     |  books.store
// GET	     |  /books/{book}	      |  show	     |  books.show
// GET	     |  /books/{book}/edit    |	 edit	     |  books.edit
// PUT/PATCH |	/books/{book}	      |  update	     |  books.update
// DELETE	 |  /books/{book}	      |  destroy	 |  books.destroy
