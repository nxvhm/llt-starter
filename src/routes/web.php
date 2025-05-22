<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
	Route::get('/', App\Livewire\Home\IndexPage::class)->name('home');
});
Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
