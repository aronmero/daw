<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actividad>
 */
class ActividadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lugar'=>$this->faker->name(),
            'descripcion'=>$this->faker->paragraph(1),
            'duracion'=>$this->faker->numberBetween(1,10),
            'fecha'=>$this->faker->dateTimeBetween('-1 years','now')
        
        ];
    }
}
