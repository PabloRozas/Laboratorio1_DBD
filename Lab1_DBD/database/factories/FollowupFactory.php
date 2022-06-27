<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Followup>
 */
class FollowupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_usuario1' => $this->faker->numberBetween($min = 1, $max = 10),
            'id_usuario2' => $this->faker->numberBetween($min = 1, $max = 10),
            'soft_deletes' => $this->faker->boolean(),
            'timestamps' => $this->faker->dateTime(),
        ];
    }
}
