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
    protected $appends = ['src'];


    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
    public function getSrcAttribute()
    {
        return asset("storage/{$this->filename}");
    }
}
