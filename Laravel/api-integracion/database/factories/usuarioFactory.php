<?php

namespace Database\Factories;
use App\Models\municipio;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\usuario>
 */
class usuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $municipio = municipio::inRandomOrder()->first(); // Obtener un municipio aleatorio
        return [
            'nombre' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telefono' => fake()->numberBetween(100000000,999999999),
            'avatar' => fake()->imageUrl(),
            'password' => bcrypt('1234'), // password
            'municipio_id' => $municipio->id,
            'remember_token' => Str::random(10),
        ];
    }
}
