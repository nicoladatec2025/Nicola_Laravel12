<?php

namespace Database\Seeders;

use App\Models\HomeSection;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class HomeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Capturar possíveis exceções durante a execução do seeder.
        try {
            // Se não encontrar o registro com o nome, cadastra o registro no BD
            HomeSection::firstOrCreate(
                [],
                [
                    'main_title' => 'Gerencie Seus Serviços com o nosso sistema de gestão!',
                    'main_description' => 'Soluções tecnológicas inovadora de serviços informático, Formação, Criação sistema web de gestão de serviços e Venda de diversos produtos!',
                    'feature_one_title' => 'Nossos Sereviços',
                    'feature_one_description' => 'Suporte técnico em equipamentos informáticos, Serviços de Syber como Trabalhos escolalares, Monografia(Teolria e projecto prático), Comercio de diversoss produtos.',
                    'feature_two_title' => 'Nosso Sistema Web',
                    'feature_two_description' => 'Nosso sistema Web de gestão é adaptavel para todo tipo de serviços, como: Colegio, centro formação e pequena empresas, entrega dentro de uma semana, e com preço promocional.',
                    'feature_three_title' => 'Nossos Cursos',
                    'feature_three_description' => 'Temos vários cursos em tecnologia de informação, como: Informática, design gráfico, excel avançado e outros cursos administrativos.',
                ],
            );
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Conteúdo do site não cadastrado.', ['error' => $e->getMessage()]);
        }
    }
}
