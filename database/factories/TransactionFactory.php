<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        $tipo = $this->faker->randomElement(['entrada', 'saida']);
        $categoriasEntrada = ['Vendas', 'Serviços', 'Investimentos', 'Reembolso', 'Outros'];
        $categoriasSaida   = ['Salários', 'Aluguel', 'Fornecedores', 'Impostos', 'Manutenção', 'Marketing', 'Outros'];

        return [
            'descricao'        => $this->faker->sentence(3),
            'tipo'             => $tipo,
            'valor'            => $tipo === 'entrada'
                                   ? $this->faker->randomFloat(2, 100, 50000)
                                   : $this->faker->randomFloat(2, 50, 30000),
            'data_transacao'   => $this->faker->dateTimeBetween('-18 months', 'now'),
            'categoria'        => $tipo === 'entrada'
                                   ? $this->faker->randomElement($categoriasEntrada)
                                   : $this->faker->randomElement($categoriasSaida),
            'metodo_pagamento' => $this->faker->randomElement(['Dinheiro', 'Cartão', 'Transferência', 'Pix']),
            'referencia'       => $this->faker->optional()->bothify('REF-########'),
            'observacao'       => $this->faker->optional()->sentence(),
        ];
    }
}