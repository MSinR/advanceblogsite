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
Route::group(['middleware' => ['web']], function() {
	//Authentication Route
	//Route::get('auth/login', 'Auth\LoginController@getLogin');
	//Route::post('auth/login', 'Auth\LoginController@postLogin');
	//Route::get('auth/login', 'Auth\LoginController@getLogin');

	//Registration Route
	//Route::get('auth/register', 'Auth\RegisterController@getRegister');
	//Route::post('auth/register', 'Auth\RegisterController@postRegister');


	

	//Categories
	Route::resource('/categories', 'CategoryController', ['except' => ['create']]); 
	//or u can use ['only' => ['create', 'index']

	//Tags
	Route::resource('/tags', 'TagController', ['except' => ['create']]); 
	//or u can use ['only' => ['create', 'index']

	//comments
	Route::post('comments/{post_id}', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);
	Route::get('comments/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentsController@edit']);
	Route::put('comments/{id}', ['as' => 'comments.update', 'uses' => 'CommentsController@update']);
	Route::delete('comments/{id}', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);
	Route::get('comments/{id}/delete', ['as' => 'comments.delete', 'uses' => 'CommentsController@delete']);

	Auth::routes();
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
	Route::get('blog', ['uses' => 'BlogController@getIndex']);
	Route::get('/contact', 'PagesController@getContact');
	Route::post('/contact', 'PagesController@postContact');
	Route::get('/about', 'PagesController@getAbout');
	Route::get('/', 'PagesController@getIndex')->name('home');
	Route::resource('/posts', 'PostsController');


});


	
