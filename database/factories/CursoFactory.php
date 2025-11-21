<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    public function definition(): array
    {
        $titulo = $this->faker->unique()->sentence(3);
        return [
            'titulo' => $titulo,
            'descricao' => $this->faker->paragraph(),
            'preco' => $this->faker->randomFloat(2, 1000, 5000),
            'nivel' => $this->faker->randomElement(['iniciante','intermediário','avançado']),
            'categoria' => $this->faker->randomElement(['Web','Dados','DevOps']),
            'ativo' => $this->faker->boolean(85),
            'carga_horaria' => $this->faker->numberBetween(8, 60),
        ];
    }
}
