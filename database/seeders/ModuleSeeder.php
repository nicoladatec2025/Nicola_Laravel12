<?php

namespace Database\Seeders;

use App\Models\Module;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Capturar possíveis exceções durante a execução do seeder.
        try {
            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Module::firstOrCreate(
                ['name' => 'Turma A', 'id' => 1],
                ['id' => 1, 'name' => 'Turma A', 'course_batch_id' => 1],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Module::firstOrCreate(
                ['name' => 'Turma B', 'id' => 2],
                ['id' => 2, 'name' => 'Turma B', 'course_batch_id' => 1],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Module::firstOrCreate(
                ['name' => 'Turma C', 'id' => 3],
                ['id' => 3, 'name' => 'Turma C', 'course_batch_id' => 1],
            );
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Turma não cadastrado.', ['error' => $e->getMessage()]);
        }
    }
}
