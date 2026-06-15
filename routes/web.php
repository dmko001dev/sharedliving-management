<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PropertyPageController;
use App\Http\Controllers\ServicePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/about', fn () => view('pages.about'))->name('about');
Route::get('/properties', [PropertyPageController::class, 'index'])->name('properties');
Route::get('/services', [ServicePageController::class, 'index'])->name('services');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
