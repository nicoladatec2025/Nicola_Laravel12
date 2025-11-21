<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCursoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'titulo' => ['required','string','max:150'],
            'descricao' => ['nullable','string','max:5000'],
            'imagem' => ['nullable','image','max:2048'],
            'preco' => ['required','numeric','min:0'],
            'nivel' => ['nullable','in:iniciante,intermediário,avançado'],
            'categoria' => ['nullable','string','max:100'],
            'ativo' => ['nullable','boolean'],
            'carga_horaria' => ['nullable','integer','min:0'],
        ];
    }
}
