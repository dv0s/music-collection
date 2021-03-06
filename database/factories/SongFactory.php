<?php

namespace Database\Factories;

use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Str;
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
        $name = $this->faker->name;
        return [
            "album_id" => Album::all()->random()->id,
            "title" => $name,
            "slug" => Str::slug($name),
            "release" => $this->faker->date('Y-m-d', 'now'),
            "rating" => $this->faker->numberBetween(1, 5),
            "length" => $this->faker->time('H:i:s',rand(120,300)),
        ];
    }
}
