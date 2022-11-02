<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function ()
{
    Route::middleware("auth")->group(function ()
    {
        Route::get('/logout', 'AuthController@logout')->name('logout');

        /**
         * NoteController Routes
         */
        Route::get('/', 'NoteController@index')->name('notepad');
        Route::get('/notes', 'NoteController@viewNoties')->name('notes');
        Route::post('/store', 'NoteController@store')->name('store');
    });

    Route::middleware("guest")->group(function ()
    {
        Route::get('/login', 'AuthController@showLoginForm')->name('login');
        Route::post('/login_process', 'AuthController@login')->name('login_process');

        Route::get('/register', 'AuthController@showRegisterForm')->name('register');
        Route::post('/register_process', 'AuthController@register')->name('register_process');

        Route::get('/forgot', 'AuthController@showForgotForm')->name('forgot');
        Route::post('/forgot_process', 'AuthController@forgot')->name('forgot_process');
    });
});
