<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               // Verificar se o usuário está cadastrado no banco de dados
            if (!User::where('email', 'augusto@nicolau.com')->first()) {
                // Cadastrar o usuário
                User::create([
                    'name' => 'Augusto',
                    'email' => 'augusto@nicolau.com',
                    'password' => '123456A#',
                ]);

            }
            // Se não encontrar o registro com o e-mail, cadastra o registro no BD
        User::firstOrCreate(
            ['email' => 'kelly@celke.com'],
            ['name' => 'Kelly', 'email' => 'kelly@celke.com', 'password' => '123456A#'],
        );

        // Se não encontrar o registro com o e-mail, cadastra o registro no BD
        User::firstOrCreate(
            ['email' => 'jessica@celke.com.br'],
            ['name' => 'Jessica', 'email' => 'jessica@celke.com.br', 'password' => '123456A#'],

        );

        // Se não encontrar o registro com o e-mail, cadastra o registro no BD
        User::firstOrCreate(
            ['email' => 'gabrielly@celke.com.br'],
            ['name' => 'Gabrielly', 'email' => 'gabrielly@celke.com.br', 'password' => '123456A#'],
        );

        }
}
