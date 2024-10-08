<?php

use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\HomePage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/products', ProductsPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/cart', CartPage::class);



Route::get('/login', LoginPage::class);
Route::get('/register', RegisterPage::class);

Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        auth()->guard()->logout();
        return redirect('/');
    });
});