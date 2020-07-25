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

Route::get('/', 'HomeController@showHomePage')->name('home_page');

Route::get('/api/items', 'HomeController@getAllItems')->name('get_items_api');

Route::post('/add', 'HomeController@addNewItem')->name('add_new_item');
