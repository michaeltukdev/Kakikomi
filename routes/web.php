<?php

use App\Livewire\CreateNote;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/note/create', CreateNote::class)->name('note.create');