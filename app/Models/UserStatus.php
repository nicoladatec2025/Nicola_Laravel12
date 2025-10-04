<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    // Indicar o nome da tabela
    protected $table = 'User_statuses';

    // Indicar quais colunas podem ser manipuladas
    protected $fillable = ['name'];
}
