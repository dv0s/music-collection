<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Album;
use App\Scopes\OrderByNewestScope;
use App\Scopes\OrderByTitleScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;

    protected $casts = [
        'release' => 'date',
        'length' => 'datetime'
    ];

    protected static function booted(){
        static::addGlobalScope(new OrderByTitleScope);
        static::addGlobalScope(new OrderByNewestScope);
    }

    /**
     * Relationships
     */

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * Accessors
     */

     public function getLengthAttribute($value){
         return Carbon::parse($value)->format('H:i:s');
     }
}
