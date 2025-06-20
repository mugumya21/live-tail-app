<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\CRM\Customer;
use App\Livewire\POS\Sales;
use App\Livewire\POS\ProductForm;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('customers', Customer::class)->name('customers.list');
    Route::get('sales', Sales::class)->name('sales.create');
    Route::get('products', ProductForm::class)->name('products.create');



});

require __DIR__.'/auth.php';
