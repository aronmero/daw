<?php

namespace Database\Factories;

use App\Models\comercio;
use App\Models\particular;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\seguido>
 */
class seguidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $particular = particular::inRandomOrder()->first(); 
        $comercio = comercio::inRandomOrder()->first(); 
        return [
            'seguidor_id' => $particular->usuario_id,
            'seguido_id' => $comercio->usuario_id,
        ];
    }
}
