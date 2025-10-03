<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Capturar possíveis exceções durante a execução do seeder.
        try {
            // Verificar se o usuário está cadastrado no banco de dados
            if (!User::where('email', 'augusto@nicolau.com')->first()) {
                // Cadastrar o usuário
                User::create([
                    'name' => 'Augusto',
                    'email' => 'augusto@nicolau.com',
                    'password' => '123456A#',
                ]);
            }

            if (App::environment() !== 'production') {
                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                User::firstOrCreate(
                    ['email' => 'kelly@oliveira.com'],
                    ['name' => 'Kelly', 'email' => 'kelly@oliveira.com', 'password' => '123456A#'],
                );

                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                User::firstOrCreate(
                    ['email' => 'jessica@jose.com'],
                    ['name' => 'Jessica', 'email' => 'jessica@jose.com', 'password' => '123456A#'],
                );

                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                User::firstOrCreate(
                    ['email' => 'gabriel@joaquim.com'],
                    ['name' => 'Gabriel', 'email' => 'gabriel@joaquim.com', 'password' => '123456A#'],
                );
            }
        } catch (Exception $e) {
            // Lidar com a exceção
        }
    }
}
