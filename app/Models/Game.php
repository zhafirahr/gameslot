<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'price',
        'genre_id',
        'pegi_rating',
    ];

    public function genre()
    {
        return $this->belongsTo(GameGenre::class);
    }
}
