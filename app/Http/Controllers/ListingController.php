<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $listings = Listing::paginate(10)->withQueryString();
        $filters = $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);
        //return $filters;
        //return $listings;
        return inertia('Listing/Index', ['listings' => $listings, 'filters' => $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'])]);
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
        $validatedData = $request->validate([
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'area' => 'required|integer',
            'city' => 'required|string',
            'code' => 'required|string',
            'street' => 'required|string',
            'street_nr' => 'required|string',
        ]);

        $listing = Listing::findOrFail($id);

        $listing->update($validatedData);

        return redirect('/listings')->with('success', 'Listing updated successfully!');
    }
}
