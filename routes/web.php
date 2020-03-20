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



Route::get('/category','LibraryController@showCategory');
Route::post('/category-post','LibraryController@saveCategory');
Route::get('/category-delete/{id}','LibraryController@deleteCategory');
Route::get('/category-edit/{id}','LibraryController@editCategory');
Route::post('/category-update/{id}','LibraryController@updateCategory');

Route::get('/writer','LibraryController@showWriter');
Route::post('/writer-post','LibraryController@saveWriter');
Route::get('/writer-delete/{id}','LibraryController@deleteWriter');
Route::get('/writer-edit/{id}','LibraryController@editWriter');
Route::post('/writer-update/{id}','LibraryController@updateWriter');

Route::get('/publication','LibraryController@showPublication');
Route::post('/publication-post','LibraryController@savePublication');
Route::get('/publication-delete/{id}','LibraryController@deletePublication');
Route::get('/publication-edit/{id}','LibraryController@editPublication');
Route::post('/publication-update/{id}','LibraryController@updatePublication');

Route::get('/book','LibraryController@showBook');
Route::post('/book-post','LibraryController@saveBook');
Route::get('/book-delete/{id}','LibraryController@deleteBook');
Route::get('/book-edit/{id}','LibraryController@editBook');
Route::post('/book-update/{id}','LibraryController@updateBook');

Route::get('/', 'LibraryController@userVieW');
Route::any('/book-search', 'LibraryController@userSearch');

Route::get('/about', 'LibraryController@aboutVieW');

