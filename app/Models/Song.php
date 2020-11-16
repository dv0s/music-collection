<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;

    /**
     * Relationships
     */

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Accessors
     */

     public function getLengthAttribute($value){
         return Carbon::parse($value)->format('i:s');
     }
}
