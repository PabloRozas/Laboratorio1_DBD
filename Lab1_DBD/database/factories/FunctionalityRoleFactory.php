<?php

namespace Database\Factories;

use App\Http\Controllers\FuncionalityController;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Functionality;
use App\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FunctionalityRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_functionalities' => Functionality::all()->random()->id,
            'id_roles' => Role::all()->random()->id,
        ];
    }
}
