<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;
use App\Models\Score;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Comentario' => $this->faker->text(),
            'Num_Puntaje' => $this->faker->random_int(),
            'id_cancion' => Song::all()->random()->id,
            'id_user' => User::all()->random()->id,

        ];
    }
}
