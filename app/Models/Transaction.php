<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'tipo',
        'valor',
        'data_transacao',
        'categoria',
        'metodo_pagamento',
        'referencia',
        'observacao',
    ];

    protected $casts = [
        'data_transacao' => 'datetime',
        'valor' => 'decimal:2',
    ];
}