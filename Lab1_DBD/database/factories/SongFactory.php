<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
use App\Models\Album;
use App\Models\Location;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->words(2, true),
            'duracion' => $this->faker->dateTimeBetween($min = '00:00:05', $max = '00:06:00'),
            'restriccion_edad' => $this->faker->boolean(),
            'reproducciones' => $this->faker->randomNumber(1, 100000),
            'fecha_creacion' => $this->faker->date(),
            'url_cancion' => $this->faker->url(),
            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
            'id_genero' => Genre::all()->random()->id,
            'id_album' => Album::all()->random()->id,
            'id_pais' => Location::all()->random()->id,
        ];
    }
}
