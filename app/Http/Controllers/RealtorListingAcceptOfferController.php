<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function acceptOffer(Offer $offer)
    {
        $offer->update(['accepted_at' => now()]);
        $offer->listing->offers()->except($offer)->update(['rejected_at' => now()]);
        return redirect()->back()->with('success', 'Offer accepted successfully.');
    }
}
