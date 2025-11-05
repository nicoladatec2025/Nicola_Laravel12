<?php

namespace Database\Seeders;

use App\Models\CourseBatch;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CourseBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Capturar possíveis exceções durante a execução do seeder.
        try {
            // Se não encontrar o registro com o nome, cadastra o registro no BD
            CourseBatch::firstOrCreate(
                ['name' => 'Informática', 'id' => 1],
                ['id' => 1, 'name' => 'Informática', 'course_id' => 1],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            CourseBatch::firstOrCreate(
                ['name' => 'Laravel', 'id' => 2],
                ['id' => 2, 'name' => 'Laravel', 'course_id' => 1],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            CourseBatch::firstOrCreate(
                ['name' => 'HardWare', 'id' => 3],
                ['id' => 3, 'name' => 'HardWare', 'course_id' => 1],
            );
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Classe não cadastrada.', ['error' => $e->getMessage()]);
        }
    }
}
