<?php

use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'dashboard'])->group(function() {
	Route::get('/', App\Livewire\Home\IndexPage::class)->name('home');

// });
