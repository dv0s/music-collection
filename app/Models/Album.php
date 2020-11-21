<?php

namespace App\Models;

use App\Scopes\OrderByNewestScope;
use App\Scopes\OrderByTitleScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $casts = [
        'released_at' => 'date'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new OrderByTitleScope);
        static::addGlobalScope(new OrderByNewestScope);
    }

    /**
     * Relationships
     */

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
