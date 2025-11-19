@extends('layouts.admin')
@section('title', isset($news) ? 'Editar Notícia' : 'Nova Notícia')
@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">
        {{ isset($news) ? 'Editar Notícia' : 'Nova Notícia' }}
    </h1>
    {{-- Erros de validação --}}
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form
        method="POST"
        action="{{ isset($news) ? route('admin.news.update', $news) :
route('admin.news.store') }}"
        enctype="multipart/form-data"
        class="bg-white shadow-md rounded-lg p-6"
    >
        @csrf
        @if(isset($news))
            @method('PUT')
        @endif
        {{-- Título --}}
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                Título *
            </label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title', $news->title ?? '') }}"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2
focus:ring-blue-500"
            >
        </div>
        {{-- Slug --}}
        <div class="mb-6">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                Slug (deixe em branco para gerar automaticamente)
            </label>
            <input
                type="text"
                name="slug"
                id="slug"
                value="{{ old('slug', $news->slug ?? '') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2
focus:ring-blue-500"
            >
        </div>
        {{-- Autor --}}
        <div class="mb-6">
            <label for="author" class="block text-sm font-medium text-gray-700 mb-2">
                Autor *
            </label>
            <input
                type="text"
                name="author"
                id="author"
                value="{{ old('author', $news->author ?? Auth::user()->name) }}"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2
focus:ring-blue-500"
            >
        </div>
        {{-- Resumo --}}
        <div class="mb-6">
            <label for="summary" class="block text-sm font-medium text-gray-700 mb-2">
                Resumo *
            </label>
            <textarea
                name="summary"
                id="summary"
                rows="3"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2
focus:ring-blue-500"
            >{{ old('summary', $news->summary ?? '') }}</textarea>
        </div>
        {{-- Conteúdo --}}
        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                Conteúdo *
            </label>
            <textarea
                name="content"
                id="content"
                rows="10"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2
focus:ring-blue-500"
            >{{ old('content', $news->content ?? '') }}</textarea>
        </div>
        {{-- Imagem --}}
        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                Imagem
            </label>

            @if(isset($news) && $news->image)
                <img
                    src="{{ asset('storage/' . $news->image) }}"
                    alt="Imagem atual"
                    class="w-48 h-32 object-cover rounded mb-3"
                >
            @endif

            <input
                type="file"
                name="image"
                id="image"
                accept="image/*"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
            >
        </div>
        {{-- Status de publicação --}}
        <div class="mb-6">
            <label class="flex items-center">
                <input
                    type="checkbox"
                    name="is_published"
                    value="1"
                    {{ old('is_published', $news->is_published ?? false) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                >
                <span class="ml-2 text-sm text-gray-700">Publicar imediatamente</span>
            </label>
        </div>
        {{-- Botões --}}
        <div class="flex gap-4">
            <button
                type="submit"
                class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700
transition"
            >
                {{ isset($news) ? 'Atualizar' : 'Criar' }} Notícia
            </button>

            <a
                href="{{ route('admin.news.index') }}"
                class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300
transition"
            >
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
