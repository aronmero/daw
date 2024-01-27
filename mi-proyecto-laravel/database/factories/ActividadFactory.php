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
        $dateTime = $this->faker->dateTimeBetween('now', '+3 months');

        $duracion=$this->faker->numberBetween(1, 8);

        $hour = $this->faker->numberBetween(13, 20);
        $minutes = $this->faker->numberBetween(0, 3) * 15; 

        // Establecer los segundos a 0
        $dateTime->setTime($hour-$duracion, $minutes, 0);

        return [
            'lugar' => $this->faker->city(),
            'descripcion' => $this->faker->paragraph(1),
            'duracion' => $duracion,
            'fecha' => $dateTime,
            'horaInicio' => $dateTime->format('H:i'),
        ];
    }
}
