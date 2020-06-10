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

Route::get('/', 'PagesController@index')
	->name('home');

Route::get('productos/{category}', 'PagesController@categoryCatalog')
	->name('category-catalog');

Route::get('productos/{category}/{product}', 'PagesController@productShow')
	->name('single-product');

Route::get('listado-de-precios', 'PagesController@priceList')
	->name('price-list');

Route::get('quienes-somos', 'PagesController@about')
	->name('about');

Route::get('contacto', 'PagesController@contact')
	->name('contact');

Route::get('productos', 'PagesController@catalog')
	->name('catalog');

Route::get('contacto', 'PagesController@contact')
	->name('contact');

Route::post('contacto', 'ContactController@store')
	->name('create-contact');


Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

	//General pages 
	
	Route::get('/', 'PagesController@admin')
		->middleware('can:edit')
		->name('admin');

	//Categories

	Route::get('categorias', 'CategoryController@admin')
		->middleware('can:edit')
		->name('categories');

	Route::get('categorias/create', 'CategoryController@create')
		->middleware('can:edit')
		->name('create-category');

	Route::post('categorias', 'CategoryController@store')
		->middleware('can:edit')
		->name('store-category');

	Route::get('categorias/{category}/edit', 'CategoryController@edit')
		->middleware('can:edit')
		->name('edit-category');

	Route::patch('categorias/{category}', 'CategoryController@update')
		->middleware('can:edit')
		->name('update-category');

	Route::get('categorias/{category}/delete', 'CategoryController@delete')
		->middleware('can:edit')
		->name('delete-category');

	//Sliders

	Route::get('sliders', 'SliderController@admin')
		->middleware('can:edit')
		->name('sliders');

	Route::get('sliders/create', 'SliderController@create')
		->middleware('can:edit')
		->name('create-slider');

	Route::post('sliders/store', 'SliderController@store')
		->middleware('can:edit')
		->name('store-slider');

	Route::get('slider/{slider}/edit', 'SliderController@edit')
		->middleware('can:edit')
		->name('edit-slider');

	Route::patch('slider/{slider}', 'SliderController@update')
		->middleware('can:edit')
		->name('update-slider');

	//Products

	Route::get('productos', 'ProductsController@admin')
		->middleware('can:edit')
		->name('products');

	Route::get('productos/create', 'ProductsController@create')
		->middleware('can:edit')
		->name('create-product');

	Route::get('productos/{product}/edit', 'ProductsController@edit')
		->middleware('can:edit')
		->name('edit-product');

	Route::patch('productos/{product}', 'ProductsController@update')
		->middleware('can:edit')
		->name('update-product');

	Route::get('productos/{product}/delete', 'ProductsController@delete')
		->middleware('can:edit')
		->name('delete-product');

	Route::post('productos', 'ProductsController@store')
		->middleware('can:edit')
		->name('store-product');

	//Contact
	Route::get('solicitudes-de-contacto', 'ContactController@admin')
		->middleware('can:edit')
		->name('contacts');


});

Auth::routes([ 'verify' => true ]);

Route::get('/logout', 'Auth\LoginController@logout');


