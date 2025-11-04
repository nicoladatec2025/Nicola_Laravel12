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
                ['name' => 'João', 'id' => 1],
                ['id' => 1, 'name' => 'João'],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Course::firstOrCreate(
                ['name' => 'Antóninio', 'id' => 2],
                ['id' => 2, 'name' => 'Antóninio'],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Course::firstOrCreate(
                ['name' => 'Miguel', 'id' => 3],
                ['id' => 3, 'name' => 'Miguel'],
            );
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Formando não cadastrado.', ['error' => $e->getMessage()]);
        }
    }
}
