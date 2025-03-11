<?php

use App\Livewire\Auth\Password;
use App\Livewire\Auth\Profile;
use App\Livewire\LoginPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('login', LoginPage::class)->name('login')->middleware('guest');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('profile', Profile::class)->name('auth.profile');
    Route::get('password', Password::class)->name('auth.password');

    require __DIR__ . '/super.php';
    require __DIR__ . '/admin.php';

    Route::get('logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    })->name('logout');
});
