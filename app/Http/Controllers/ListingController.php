<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
    public function create()
    {
        return inertia('Listing/Create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'area' => 'required|integer',
            'city' => 'required|string',
            'code' => 'required|string',
            'street' => 'required|string',
            'street_nr' => 'required|string',
        ]);

        Listing::create($validated);

        return redirect('/listings');
    }
    public function edit($id)
    {

        $listing = Listing::find($id);
        return inertia('Listing/Edit', ['listing' => $listing]);
    }
    public function update($id, Request $request)
    {
        return redirect('/listings');
    }
}
