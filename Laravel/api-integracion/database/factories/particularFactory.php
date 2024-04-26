<?php

namespace Database\Factories;

use App\Models\particular;
use App\Models\usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\particular>
 */
class particularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuario = Usuario::factory()->create()->assignRole('Particular');;
        $fechaMinima = fake()->dateTimeThisCentury('-16 years');
        return [
            'usuario_id' => $usuario->id,
            'primer_apellido' => fake()->lastName(),
            'segundo_apellido' =>  fake()->lastName(),
            'sexo' => fake()->randomElement(['m', 'h']),
            'fecha_nacimiento' => $fechaMinima->format('Y-m-d'),
        ];
    }

}
