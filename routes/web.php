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

Route::get('/listings', [ListingController::class, 'index']);
Route::get('/listings/{id}', [ListingController::class, 'show']);
Route::get('/listing/create', [ListingController::class, 'create']);
Route::post('/listing/create', [ListingController::class, 'store']);
Route::get('/listing/edit/{id}', [ListingController::class, 'edit']);
Route::put('/listing/update/{id}', [ListingController::class, 'update']);
