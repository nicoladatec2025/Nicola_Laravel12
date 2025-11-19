<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


class Conta extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use HasFactory, SoftDeletes;

    // Indicar o nome da tabela
    protected $table = 'contas';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'valor', 'vencimento', 'situacao_conta_id'];

    public function situacaoConta()
    {
        return $this->belongsTo(SituacaoConta::class);
    }
}
