<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    /**
     * Get the image that owns the artist.
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
