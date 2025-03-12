<?php

use App\Livewire\Super\AddUser;
use App\Livewire\Super\Dashboard;
use App\Livewire\Super\EditUser;
use App\Livewire\Super\Users;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:super', 'prefix' => 'super'], function () {
    Route::get('dashboard', Dashboard::class)->name('super.dashboard');
    Route::get('add-user', AddUser::class)->name('super.add-user');
    Route::get('users', Users::class)->name('super.users');
    Route::get('user/{id}', EditUser::class)->name('super.edit-user');
});