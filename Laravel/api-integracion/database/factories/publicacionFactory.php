<?php

namespace Database\Factories;

use App\Models\tipo_publicacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\publicacion>
 */
class publicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateTime = $this->faker->dateTimeBetween('-7 days', 'now');
        $dateStart = $this->faker->dateTimeBetween('now', '+3 days');
        $dateEnd = $this->faker->dateTimeBetween('+4 days', '+14 days');

        $tipo = tipo_publicacion::inRandomOrder()->first();
        return [
            'imagen' => fake()->imageUrl(),
            'titulo' =>  fake()->text(20),
            'descripcion' => fake()->text(150),
            'tipo_id' => $tipo->id,
            'fecha_publicacion' => $dateTime,
            'fecha_inicio' => $dateStart ,
            'fecha_fin' => $dateEnd,
            'activo' => fake()->boolean(80)
        ];
    }
}
