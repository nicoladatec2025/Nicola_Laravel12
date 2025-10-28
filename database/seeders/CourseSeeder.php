<?php

namespace Database\Seeders;

use App\Models\Course;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Capturar possíveis exceções durante a execução do seeder.
        try {
            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Course::firstOrCreate(
                ['name' => '2022-2023', 'id' => 1],
                ['id' => 1, 'name' => '2022-2023'],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Course::firstOrCreate(
                ['name' => '2023-2024', 'id' => 2],
                ['id' => 2, 'name' => '2023-2024'],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Course::firstOrCreate(
                ['name' => '2024-2025', 'id' => 3],
                ['id' => 3, 'name' => '2024-2025'],
            );
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Lactivo não cadastrado.', ['error' => $e->getMessage()]);
        }
    }
}
