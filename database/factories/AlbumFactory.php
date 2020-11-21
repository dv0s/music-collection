<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            "artist_id" => Artist::all()->random()->id,
            "genre_id" => Genre::all()->random()->id,
            "title" => $name,
            "slug" => Str::slug($name),
            "released_at" => $this->faker->date('Y-m-d', 'now'),
            "description" => $this->faker->realText(200)
        ];
    }
}
