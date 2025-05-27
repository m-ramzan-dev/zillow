<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    protected $table = "listing_images";

    protected $fillable = [
        'filename',
        'listing_id',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
    public function getUrlAttribute()
    {
        return asset('storage/listing_images/' . $this->filename);
    }
}
