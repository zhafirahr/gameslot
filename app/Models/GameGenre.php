<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameGenre extends Model
{
    protected $table = 'game_genres';
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'genre_id');
    }

}
