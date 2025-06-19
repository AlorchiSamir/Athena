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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/settings', 'SettingController@index');
Route::post('/settings', 'SettingController@index');
Route::get('/search/{query}', 'SearchController@index');
Route::get('/book', 'BookController@index');
Route::get('/author', 'AuthorController@index');
Route::get('/tag', 'TagController@index');
Route::get('/author/{id}/{slug}', 'AuthorController@view')->name('author')->middleware('setvisit');
Route::get('/book/{id}/{slug}', 'BookController@view')->name('book')->middleware('setvisit');
Route::get('/category/{id}/{slug}', 'BookController@category')->name('category')->middleware('setvisit');
Route::get('/tag/{id}/{slug}', 'TagController@view')->name('tag')->middleware('setvisit');
Route::post('/book/comment/insert', 'CommentController@insert');
Route::get('/book/interaction/{type}', 'InteractionController@index');
Route::post('/user/interaction', 'InteractionController@interaction');

Route::post('/request/send', 'RequestController@send')->name('message.send');

Route::post('/author/ajaxList', 'AuthorController@ajaxList');
Route::post('/author/ajaxAuthor', 'AuthorController@ajaxAuthor');

Route::middleware('admin')->group(function() {
    Route::get('/admin', 'Admin\AdminController@index');

    Route::get('/admin/author', 'Admin\AuthorController@index');
    Route::get('/admin/author/create', 'Admin\AuthorController@create');
    Route::post('/admin/author/insert', 'Admin\AuthorController@create');    
    Route::get('/admin/author/update/{id}', 'Admin\AuthorController@update');
    Route::post('/admin/author/update/{id}', 'Admin\AuthorController@update');

    Route::get('/admin/category', 'Admin\CategoryController@index');
    Route::get('/admin/category/create', 'Admin\CategoryController@create');
    Route::post('/admin/category/insert', 'Admin\CategoryController@create');    
    Route::get('/admin/category/update/{id}', 'Admin\CategoryController@update');
    Route::post('/admin/category/update/{id}', 'Admin\CategoryController@update');

    Route::get('/admin/tag', 'Admin\TagController@index');
    Route::get('/admin/tag/create', 'Admin\TagController@create');
    Route::post('/admin/tag/insert', 'Admin\TagController@create');    
    Route::get('/admin/tag/update/{id}', 'Admin\TagController@update');
    Route::post('/admin/tag/update/{id}', 'Admin\TagController@update');

    Route::post('/admin/book/buylink', 'Admin\BookController@buylink');
    Route::post('/admin/book/cover', 'Admin\BookController@cover');

    Route::get('/admin/book', 'Admin\BookController@index');
    Route::get('/admin/book/create', 'Admin\BookController@create');
    Route::post('/admin/book/insert', 'Admin\BookController@create');
    Route::get('/admin/book/{id}', 'Admin\BookController@view');
    Route::get('/admin/book/update/{id}', 'Admin\BookController@update');
    Route::post('/admin/book/update/{id}', 'Admin\BookController@update');
    Route::get('/admin/book/status/{status}/{id}', 'Admin\BookController@status');

    Route::get('/admin/request', 'Admin\RequestController@index')->name('admin.request');
    Route::get('/admin/request/{id}/valid', 'Admin\RequestController@valid')->name('admin.request.valid');
    Route::get('/admin/request/{id}/cancel', 'Admin\RequestController@cancel')->name('admin.request.cancel');



});
