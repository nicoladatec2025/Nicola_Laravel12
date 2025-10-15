<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

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
                $superAdmin = User::create([
                    'name' => 'Augusto',
                    'email' => 'augusto@nicolau.com',
                    'password' => '123456A#',
                ]);

                // Atribuir papel para o usuário
                $superAdmin->assignRole('Super Admin');
            }

            if (App::environment() !== 'production') {
                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                $admin = User::firstOrCreate(
                    ['email' => 'maria@oliveira.com'],
                    ['name' => 'Maria', 'email' => 'maria@oliveira.com', 'password' => '123456A#'],
                );

                // Atribuir papel para o usuário
                $admin->assignRole('Admin');

                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                $teacher = User::firstOrCreate(
                    ['email' => 'natan@oliveira.com'],
                    ['name' => 'Natan', 'email' => 'natan@oliveira.com', 'password' => '123456A#'],
                );

                // Atribuir papel para o usuário
                $teacher->assignRole('Professor');
                // $teacher->assignRole('Aluno');

                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                $tutor = User::firstOrCreate(
                    ['email' => 'lud@oliveira.com'],
                    ['name' => 'Lud', 'email' => 'lud@oliveira.com', 'password' => '123456A#'],
                );

                // Atribuir papel para o usuário
                $tutor->assignRole('Tutor');

                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                $student = User::firstOrCreate(
                    ['email' => 'nico@oliveira.com'],
                    ['name' => 'Nico', 'email' => 'nico@oliveira.com', 'password' => '123456A#'],
                );

                // Atribuir papel para o usuário
                $student->assignRole('Aluno');
            }
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Usuário não cadastrado.', ['error' => $e->getMessage()]);
        }
    }
}
