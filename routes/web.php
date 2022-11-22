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
        Route::post('/store', 'NoteController@store')->name('store');

        Route::get('/notes/create', 'NoteController@create')->name('note_create');
        Route::get('/notes', 'NoteController@viewNoties')->name('notes');
        Route::get('/notes/{id}', 'NoteController@showSelectedNote')->name('selected_note');

        Route::get('/notes/{id}/update', 'NoteController@editField')->name('note_update');
        Route::post('/notes/{id}/update', 'NoteController@update')->name('note_update_submit');

        Route::get('/note/deleteAll', 'NoteController@deleteAll')->name('notes_delete');
        Route::get('/note/{id}/delete', 'NoteController@delete')->name('note_delete');

        /**
         * CommentController Routes
         */
        Route::post('/notes/{id}/comments', 'CommentController@store')->name('store_comment');
    });

    Route::middleware("guest")->group(function () {
        /**
         * AuthController Routes
         */
        Route::get('/login', 'AuthController@showLoginForm')->name('login');
        Route::post('/login', 'AuthController@login')->name('login_process');

        Route::get('/register', 'AuthController@showRegisterForm')->name('register');
        Route::post('/register', 'AuthController@register')->name('register_process');

        Route::get('/forgot', 'AuthController@showForgotForm')->name('forgot');
        Route::post('/forgot', 'AuthController@forgot')->name('forgot_process');
    });
});
