<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName;
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "formed_at" => $this->faker->date('Y-m-d','now'),

        ];
    }
}
