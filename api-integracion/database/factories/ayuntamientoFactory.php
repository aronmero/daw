<?php

namespace Database\Factories;

use App\Models\token;
use App\Models\usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ayuntamiento>
 */
class ayuntamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $token = token::factory()->create();
        $usuario = usuario::factory()->create();
        return [
            'usuario_id' => $usuario->id,
            'direccion' => fake()->postcode(),
            'tokenVerification' => $token->id
        ];
    }
}
