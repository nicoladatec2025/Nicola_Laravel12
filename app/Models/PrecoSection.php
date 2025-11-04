<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrecoSection extends Model
{

    // Indicar o nome da tabela
    protected $table = 'preco_sections';

    // Indicar quais colunas podem ser manipuladas
    protected $fillable = [
        
        'preco_informatica', 
         'preco_excel',
        'preco_hardware',
        'preco_desin',
         'preco_php',  
        'preco_laravel',
        'preco_mysql',
        'preco_pedagogia',
        'preco_atendimente',
        'preco_oratoria',
        'preco_ingles',
    ];
}
