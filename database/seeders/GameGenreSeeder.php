<?php

namespace Database\Seeders;

use App\Models\GameGenre;
use Illuminate\Database\Seeder;

class GameGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create many game genres
        $data = [
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Casual'],
            ['name' => 'Indie'],
            ['name' => 'MMO'],
            ['name' => 'Racing'],
            ['name' => 'RPG'],
            ['name' => 'Simulation'],
            ['name' => 'Sports'],
            ['name' => 'Strategy'],
        ];

        foreach ($data as $genre) {
            GameGenre::create($genre);
        }
    }
}
