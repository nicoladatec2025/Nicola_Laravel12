<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        // Registros manuais importantes (ex.: saldos de abertura, lançamentos conhecidos)
        $fixos = [
            [
                'descricao'      => 'Saldo de abertura',
                'tipo'           => 'entrada',
                'valor'          => 100000.00,
                'data_transacao' => now()->startOfYear()->setMonth(1)->setDay(1)->setTime(9, 0),
                'categoria'      => 'Abertura',
                'metodo_pagamento' => 'Transferência',
                'referencia'     => 'ABERT-2025',
                'observacao'     => 'Capital inicial',
            ],
            [
                'descricao'      => 'Aluguel escritório',
                'tipo'           => 'saida',
                'valor'          => 8000.00,
                'data_transacao' => now()->startOfMonth()->setDay(1)->setTime(10, 0),
                'categoria'      => 'Aluguel',
                'metodo_pagamento' => 'Transferência',
                'referencia'     => 'ALUG-'.now()->format('Ym'),
                'observacao'     => 'Contrato anual',
            ],
            [
                'descricao'      => 'Folha de pagamento',
                'tipo'           => 'saida',
                'valor'          => 25000.00,
                'data_transacao' => now()->startOfMonth()->setDay(5)->setTime(17, 0),
                'categoria'      => 'Salários',
                'metodo_pagamento' => 'Transferência',
                'referencia'     => 'SAL-'.now()->format('Ym'),
                'observacao'     => 'Equipe fixa',
            ],
        ];

        foreach ($fixos as $f) {
            Transaction::create($f);
        }

        // Lançamentos aleatórios para último ano e ano atual
        Transaction::factory()
            ->count(10) // ajusta conforme volume desejado
            ->create();
    }
}
