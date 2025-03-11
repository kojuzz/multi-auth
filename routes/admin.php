<?php

use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
});
