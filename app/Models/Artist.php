<?php

namespace App\Models;

use App\Scopes\OrderByNameScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $casts = [
        'formed_at' => 'date'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new OrderByNameScope);
    }

    /**
     * Relationships
     */

    public function albums(){
        return $this->hasMany(Album::class);
    }
}
