<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NoteController::class, 'index'])->name('home');

Route::post('/store', [NoteController::class, 'store'])->name('store');
