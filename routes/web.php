<?php

use App\Livewire\Home;
use App\Livewire\Note;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/note/{id?}', Note::class)->name('note');