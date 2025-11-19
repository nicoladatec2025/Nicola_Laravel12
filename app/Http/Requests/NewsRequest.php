<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $newsId = $this->route('news') ? $this->route('news')->id : null;
        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:news,slug,' . $newsId,
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'O título é obrigatório',
            'summary.required' => 'O resumo é obrigatório',
            'content.required' => 'O conteúdo é obrigatório',
            'image.image' => 'O arquivo deve ser uma imagem',
            'image.max' => 'A imagem não pode ter mais de 2MB',
        ];
    }
}
