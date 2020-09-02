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

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/#contact')->name('contact');

Route::post('/contact', 'ContactController@store')->name('contacts.store');

// Route::get('/about', 'HomeController@index')->name('about');

// Route::get('/#contact')->name('contact');