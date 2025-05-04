<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        return inertia('Listing/Index', ['listings' => $listings]);
    }
    public function show($id)
    {
        $listing = Listing::find($id);
        return inertia('Listing/Show', ['listing' => $listing]);
    }
}
