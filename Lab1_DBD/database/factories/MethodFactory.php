<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bank;
use App\Models\Card_Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Method>
 */
class MethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha_vencimiento' => $this->faker->date(),
            'CVC' => $this->faker->numberBetween(100, 999),
            'nombre_titular' => $this->faker->name(),
            'cod_banks' => Bank::all()->random()->id,
            'cod_tarjeta' => Card_Type::all()->random()->id,
            'num_tarjeta' => $this->faker->numberBetween($min = 4000000000000000,$max = 5999999999999999)
        ];
    }
}