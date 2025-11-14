<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preco;

class PrecoSeeder extends Seeder
{
    public function run()
    {
        Preco::create([
            'item' => 'Plano Básico',
            'valor' => 4900.90,
            'descricao' => 'Acesso limitado a recursos essenciais.'
        ]);

        Preco::create([
            'item' => 'Plano Premium',
            'valor' => 9900.90,
            'descricao' => 'Inclui suporte prioritário e recursos avançados.'
        ]);

        Preco::create([
            'item' => 'Plano Empresarial',
            'valor' => 19900.90,
            'descricao' => 'Solução completa para empresas com múltiplos usuários.'
        ]);

        Preco::factory()->count(10)->create();
    }
}

