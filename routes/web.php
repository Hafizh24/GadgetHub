<?php

use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/',HomePage::class);
Route::get('/login', LoginPage::class);
Route::get('/register', RegisterPage::class);