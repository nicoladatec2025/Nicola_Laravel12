<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PrecoFactory extends Factory
{
    public function definition()
    {
        return [
            'item' => $this->faker->word(), // Nome aleatório
            'valor' => $this->faker->randomFloat(2, 1000, 5000), // Valor entre 1000 e 5000
            'descricao' => $this->faker->sentence(8), // Frase curta como descrição
        ];
    }
}
