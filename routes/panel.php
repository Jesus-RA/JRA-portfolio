<?php

use Illuminate\Support\Facades\Route;

/*
    Admin Panel Routes
*/

Route::get('/', 'PanelController@index')->name('panel');// /panel

Route::resource('projects', 'ProjectController')->except(['show']);

Route::resource('technologies', 'TechnologyController');

Route::delete('/projects/image/{image}/delete', 'ProjectController@removeImage')->name('projects.remove.image');