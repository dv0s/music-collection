<?php

namespace Database\Factories;

use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "album_id" => Album::all()->random()->id,
            "artist_id" => Artist::all()->random()->id,
            "title" => $this->faker->name,
            "length" => $this->faker->time('i:s','now'),
        ];
    }
}
