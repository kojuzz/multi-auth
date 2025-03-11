<?php

use App\Livewire\Super\Dashboard;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:super', 'prefix' => 'super'], function () {
    Route::get('dashboard', Dashboard::class)->name('super.dashboard');
});