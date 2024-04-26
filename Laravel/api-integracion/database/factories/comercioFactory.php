<?php

namespace Database\Factories;

use App\Models\categoria;
use App\Models\comercio;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\usuario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comercio>
 */
class comercioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoria = categoria::inRandomOrder()->first(); // Obtener un municipio aleatorio
        $usuario = Usuario::factory()->create()->assignRole('Comercio');
        return [
            'usuario_id' => $usuario->id,
            'categoria_id' => $categoria->id,
            'direccion' =>  fake()->postcode(),
            'verificado'=>fake()->boolean(80),
            'descripcion' => fake()->text()
        ];
    }

}
