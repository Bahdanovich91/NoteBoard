<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function ()
{
    Route::middleware("auth")->group(function ()
    {
        /**
         * AuthController Routes
         */
        Route::get('/logout', 'AuthController@logout')->name('logout');

        /**
         * NoteController Routes
         */
        Route::get('/', 'NoteController@index')->name('index');
        Route::get('/notes/create', 'NoteController@create')->name('note_create');
        Route::get('/notes', 'NoteController@viewNoties')->name('notes');
        Route::get('/notes/delete', 'NoteController@deleteAllNotes')->name('notes_delete');
        Route::get('/notes/{id}', 'NoteController@showSelectedNote')->name('selected_note');
        Route::get('/notes/{id}/update', 'NoteController@noteUpdate')->name('note_update');
        Route::post('/notes/{id}/update', 'NoteController@noteUpdateSubmit')->name('note_update_submit');
        Route::get('/notes/{id}/delete', 'NoteController@deleteNote')->name('note_delete');
        Route::post('/store', 'NoteController@store')->name('store');
    });

    Route::middleware("guest")->group(function () {
        /**
         * AuthController Routes
         */
        Route::get('/login', 'AuthController@showLoginForm')->name('login');
        Route::post('/login_process', 'AuthController@login')->name('login_process');

        Route::get('/register', 'AuthController@showRegisterForm')->name('register');
        Route::post('/register_process', 'AuthController@register')->name('register_process');

        Route::get('/forgot', 'AuthController@showForgotForm')->name('forgot');
        Route::post('/forgot_process', 'AuthController@forgot')->name('forgot_process');
    });
});
