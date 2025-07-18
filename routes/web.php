<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingImageController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\RealtorListingController;
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

Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/{id}', [ListingController::class, 'show'])->name('listings.show');
Route::get('/listing/create', [ListingController::class, 'create'])->name('listings.create');
Route::post('/listing/create', [ListingController::class, 'store'])->name('listing.store');
Route::get('/listing/edit/{id}', [ListingController::class, 'edit'])->name('listing.edit');
Route::put('/listing/update/{id}', [ListingController::class, 'update'])->name('listing.update');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signIn', [AuthController::class, 'signIn'])->name('signIn');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/signup', [AuthController::class, 'signUp'])->name('signup');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('listing', RealtorListingController::class);
        Route::resource('listing.image', ListingImageController::class)->only(['create', 'store']);

        Route::put('offer/{offer}/accept', [RealtorListingAcceptOfferController::class, 'acceptOffer'])
            ->name('offer.accept');
    });

Route::resource('listing.offer', ListingOfferController::class)->middleware('auth')->only(['store']);
