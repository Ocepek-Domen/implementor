<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'marketing/Home')->name('home');
Route::inertia('/services', 'marketing/Services')->name('services');
Route::inertia('/clients', 'marketing/Clients')->name('clients');
Route::inertia('/clients/ilirika', 'marketing/clients/Ilirika')->name('clients.ilirika');
Route::inertia('/clients/nn-saunas', 'marketing/clients/NnSaunas')->name('clients.nn-saunas');
Route::inertia('/clients/mobistekla', 'marketing/clients/Mobistekla')->name('clients.mobistekla');
Route::inertia('/about', 'marketing/About')->name('about');
Route::inertia('/contact', 'marketing/Contact')->name('contact');
Route::inertia('/politika-zasebnosti', 'marketing/PrivacyPolicy')->name('privacy-policy');
Route::inertia('/pogoji-uporabe', 'marketing/Terms')->name('terms');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,10')
    ->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
