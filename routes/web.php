<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function ()
{
    /**
     * NoteController Routes
     */
    Route::get('/', 'NoteController@index')->name('notepad');
    Route::get('/notes', 'NoteController@notes')->name('notes');
    Route::post('/store', 'NoteController@store')->name('store');

    /**
     * AuthController Routes
     */
    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::get('/register', 'AuthController@showRegisterForm')->name('register');
    Route::post('/register_process', 'AuthController@register')->name('register_process');
});
