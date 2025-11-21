<?php

namespace App\Models;

// app/Models/Curso.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo','slug','descricao','imagem','preco','nivel','categoria','ativo','carga_horaria'
    ];

    protected static function booted(): void
    {
        static::creating(function ($curso) {
            if (empty($curso->slug)) {
                $curso->slug = Str::slug($curso->titulo).'-'.Str::random(6);
            }
        });

        static::updating(function ($curso) {
            if ($curso->isDirty('titulo')) {
                $curso->slug = Str::slug($curso->titulo).'-'.Str::random(6);
            }
        });
    }

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true);
    }

    public function getImagemUrlAttribute(): ?string
    {
        return $this->imagem ? asset('storage/'.$this->imagem) : null;
    }
}
