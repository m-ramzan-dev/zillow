<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted')
        ];
        $listings = Auth::user()->listings()->when(
            $filters['deleted'] ?? false,
            fn($query, $value) => $query->withTrashed()
        )->paginate(5)->withQueryString();

        return inertia('Realtor/Index', ['listings' => $listings, 'filters' => $filters]);
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success', 'Listing deleted successfully');
    }
}
