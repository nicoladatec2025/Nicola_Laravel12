<?php

namespace Database\Seeders;

use App\Models\Conta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if(!Conta::where('nome', 'Energia')->first()){
            Conta::create([
                'nome' => 'Energia',
                'valor' => '7000.00',
                'vencimento' => '2025-11-23',
            ]);
        }

        if(!Conta::where('nome', 'Internet')->first()){
            Conta::create([
                'nome' => 'Internet',
                'valor' => '5000.00',
                'vencimento' => '2025-11-23',
            ]);
        }

        if(!Conta::where('nome', 'AGT')->first()){
            Conta::create([
                'nome' => 'AGT',
                'valor' => '5000.00',
                'vencimento' => '2025-11-15',
            ]);
        }

        if(!Conta::where('nome', 'Prestação A')->first()){
            Conta::create([
                'nome' => 'Prestação A',
                'valor' => '1000.00',
                'vencimento' => '2025-11-10',
            ]);
        }

        if(!Conta::where('nome', 'Formação')->first()){
            Conta::create([
                'nome' => 'Formação',
                'valor' => '9000.00',
                'vencimento' => '2025-11-15',
            ]);
        }


        if(!Conta::where('nome', 'Propina')->first()){
            Conta::create([
                'nome' => 'Propina',
                'valor' => '12000.00',
                'vencimento' => '2025-11-05',
            ]);
        }

        if(!Conta::where('nome', 'Prestação B')->first()){
            Conta::create([
                'nome' => 'Prestação B',
                'valor' => '9500.00',
                'vencimento' => '2025.11-07',
            ]);
        }

        if(!Conta::where('nome', 'Cota')->first()){
            Conta::create([
                'nome' => 'Cota',
                'valor' => '12000.00',
                'vencimento' => '2025-11-23',
            ]);
        }

        if(!Conta::where('nome', 'Cartão')->first()){
            Conta::create([
                'nome' => 'Cartão',
                'valor' => '420.00',
                'vencimento' => '2025-11-23',
            ]);
        }

        if(!Conta::where('nome', 'Aluguel')->first()){
            Conta::create([
                'nome' => 'Aluguel',
                'valor' => '120000.00',
                'vencimento' => '2025-11-23',
            ]);
        }

    }
}
