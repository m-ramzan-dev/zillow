<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    //dd(Listing::all());
    //return inertia('Welcome', ['name' => 'Muhammad Ramzan']);
    return Inertia::render('Welcome');
});
Route::get('/about', function () {
    return inertia('About');
});
Route::get('/contact', function () {
    return Inertia::render('Contact');
});

Route::resource('listings', ListingController::class)->only(['index', 'show']);
