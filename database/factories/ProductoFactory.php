<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

               'nombre' => $this->faker->word (),
               'precio' => $this->faker->randomDigit(),
                'descripcion'  => $this->faker-> paragraph(),
                'categoria' => $this->faker->randomElement(['gaseosas','lacteos','accesorios']),
              //  'categoria_id'=>Categoria::inRandomOrder()->first()

        ];
    }
}
