@extends('layouts.app')
@section('title', $news->title)
@section('content')
<article class="container mx-auto px-4 py-8 max-w-4xl">
    {{-- Breadcrumb --}}
    <nav class="mb-6 text-sm">
        <a href="{{ route('news.index') }}" class="text-blue-600 hover:underline">Notícias</a>
        <span class="text-blue-500 mx-2">/</span>
        <span class="text-gray-700">{{ $news->title }}</span>
    </nav><br>
    {{-- Imagem destacada --}}
    @if($news->image)
        <img
            src="{{ asset('storage/' . $news->image) }}"
            alt="{{ $news->title }}"
            class="w-full h-96 object-cover rounded-lg mb-6"
        >
    @endif
    {{-- Título e metadados --}}
    <header class="mb-6">
        <h1 class="text-4xl font-bold text-white-900 mb-3">{{ $news->title }}</h1>

        <div class="flex items-center text-white-600 text-sm">
            <span>{{ $news->published_at->format('d/m/Y H:i') }}</span>
            <span class="mx-3">•</span>
            <span>Por {{ $news->author }}</span>
        </div>
    </header>
   <br> {{-- Resumo --}}
    <div class="bg-blue-50 border-l-4 border-blue-600 p-4 mb-6">
        <p class="text-lg text-gray-700 font-medium">{{ $news->summary }}</p>
    </div> <br>
    {{-- Conteúdo --}}
    <div class="prose prose-lg max-w-none mb-8">
        {!! nl2br(e($news->content)) !!}
    </div>
    {{-- Notícias relacionadas --}}
    @if($relatedNews->count() > 0)

    <div class="border-t pt-8 mt-8">
           <br> <h2 class="text-2xl font-bold text-gray-900 mb-6">Notícias Relacionadas</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedNews as $related)
                    <article class="bg-white rounded-lg shadow hover:shadow-lg transition">
                        @if($related->image)
                            <img
                                src="{{ asset('storage/' . $related->image) }}"
                                alt="{{ $related->title }}"
                                class="w-full h-40 object-cover rounded-t-lg"
                            >
                        @endif

                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2 hover:text-blue-600">
                                <a href="{{ route('news.show', $related->slug) }}">
                                    {{ Str::limit($related->title, 60) }}
                                </a>
                            </h3>

                            <p class="text-sm text-gray-600">
                                {{ $related->published_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    @endif
    {{-- Botão voltar --}}
   <br> <div class="mt-8">
        <a href="{{ route('news.index') }}" class="inline-block px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray300 transition">
            ← Voltar para notícias
        </a>
    </div>
</article>
@endsection
