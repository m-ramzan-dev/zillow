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
        //return $request->all();
        Listing::create($request->all());
        return redirect('/listings');
    }
}
