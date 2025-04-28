<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return inertia('Welcome', ['name' => 'Muhammad Ramzan']);
    //return Inertia::render('Welcome');
});
Route::get('/about', function () {
    return inertia('About');
});
Route::get('/contact', function () {
    return Inertia::render('Contact');
});
