<?php

use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/products', ProductsPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/cart', CartPage::class)->name('cart');

Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class)->name('register');
});


Route::middleware('auth')->group(function () {

    Route::get('/logout', function () {
        auth()->guard()->logout();
        return redirect('/');
    });


    Route::get('/checkout', CheckoutPage::class)->name('checkout');

    Route::get('success', SuccessPage::class)->name('success');
    Route::get('cancelled', CancelPage::class)->name('cancelled');
});
