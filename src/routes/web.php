<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
	Route::get('/', App\Livewire\Home\IndexPage::class)->name('home');
	Route::get('/users', App\Livewire\Users\IndexPage::class)->name('users.index');
	Route::get('/users/create', App\Livewire\Users\ModifyPage::class)->name('users.create');
	Route::get('/users/{id}/permissions', App\Livewire\Users\PermissionsPage::class)->name('users.modify.permissions');

});
Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
