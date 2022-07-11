<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_album' => $this->faker->words(2, true),
            'duracion' => $this->faker->dateTimeBetween($min = '00:00:28', $max = '01:30:00'),
            'id_user' => User::all()->random()->id,
        ];
    }
}
