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

// Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', 'HomeController@index')->name('home');

// Login route
Route::get('/JRA/login', 'Auth\LoginController@showLoginForm')->name('show.login');
Route::post('login', 'Auth\LoginController@login')->name('login');

// Logout route
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/#contact', 'ContactController@contact')->name('contact');

Route::post('/contact', 'ContactController@store')->name('contacts.store');

Route::resource('profiles', 'ProfileController');