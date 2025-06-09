<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    private array $sortable = ['price', 'created_at'];

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];
        $listings = Auth::user()->listings()->withCount('offers')->when(
            $filters['deleted'] ?? false,
            fn($query, $value) => $query->withTrashed()
        )->when(
            $filters['by'] ?? false,
            fn($query, $value) => !in_array($value, $this->sortable) ? $query : $query->orderBy($value, $filters['order'] ?? 'desc')
        )->paginate(5)->withQueryString();


        return inertia('Realtor/Index', ['listings' => $listings, 'filters' => $filters]);
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success', 'Listing deleted successfully');
    }
    public function show(Listing $listing)
    {
        $listing->load('offers');

        return inertia('Realtor/Show', [
            'listing' => $listing,
        ]);
    }
}
