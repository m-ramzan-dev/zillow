<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);
        $listings = Listing::orderByDesc('created_at')
            ->when(
                $filters['priceFrom'] ?? false,
                fn($query, $value) => $query->where('price', '>=', $value)
            )
            ->when(
                $filters['priceTo'] ?? false,
                fn($query, $value) => $query->where('price', '<=', $value)
            )
            ->when(
                $filters['beds'] ?? false,
                fn($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
            )->when(
                $filters['baths'] ?? false,
                fn($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
            )->when(
                $filters['areaFrom'] ?? false,
                fn($query, $value) => $query->where('area', '>=', $value)
            )->when(
                $filters['areaTo'] ?? false,
                fn($query, $value) => $query->where('area', '<=', $value)
            )
            ->paginate(10)->withQueryString();

        //return $filters;
        //return $listings;
        return inertia('Listing/Index', ['listings' => $listings, 'filters' => $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'])]);
    }
    public function show($id)
    {
        $listing = Listing::with('images')->find($id);

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
