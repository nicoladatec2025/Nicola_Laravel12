<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Capturar possíveis exceções durante a execução do seeder.
        try {
            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Lesson::firstOrCreate(
                ['name' => 'Avaçando', 'id' => 1],
                ['id' => 1, 'name' => 'Avaçando', 'module_id' => 1],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Lesson::firstOrCreate(
                ['name' => 'Intermedio', 'id' => 2],
                ['id' => 2, 'name' => 'Intermedio', 'module_id' => 1],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Lesson::firstOrCreate(
                ['name' => 'Iniciante', 'id' => 3],
                ['id' => 3, 'name' => 'Iniciante', 'module_id' => 1],
            );
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Nível não cadastrado.', ['error' => $e->getMessage()]);
        }
    }
}
