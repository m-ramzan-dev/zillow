<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;

class ListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        return inertia('Listing/Image/Create', ['listing' => $listing]);
    }
    public function store(Listing $listing, Request $request)
    {
        if ($request->has('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('listing_images', 'public');
                $listing->images()->save(new ListingImage(['filename' => $path]));
            }
        }
        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }
}
