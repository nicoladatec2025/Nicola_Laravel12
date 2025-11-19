@extends('layouts.app')
@section('title', 'Notícias')

@push('styles')
<style>
  :root {
    --primary: #0d6efd;      /* azul */
    --primary-dark: #0b5ed7;
    --gray-100: #f1f3f5;
    --gray-200: #e9ecef;
    --gray-600: #6c757d;
    --gray-800: #343a40;
  }

  .page-header {
    background: linear-gradient(120deg, var(--primary) 0%, #233a57 100%);
    color: #fff;
    border-radius: .75rem;
    padding: 2rem 1.5rem;
    margin-bottom: 2rem;
    text-align: center;
  }

  .search-bar {
    background: #fff;
    border: 1px solid var(--gray-200);
    border-radius: .75rem;
    padding: 1rem;
    margin-bottom: 2rem;
  }

  .news-card {
    background: #fff;
    border: 1px solid var(--gray-200);
    border-radius: .75rem;
    overflow: hidden;
    transition: transform .2s ease, box-shadow .2s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .news-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(13, 110, 253, 0.15);
  }

  .news-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .news-body {
    padding: 1rem;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  .news-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--primary);
    text-decoration: none;
  }

  .news-title:hover {
    text-decoration: underline;
  }

  .news-meta {
    font-size: .875rem;
    color: var(--gray-600);
    margin-top: .25rem;
  }

  .news-summary {
    margin-top: .5rem;
    color: var(--gray-800);
    flex-grow: 1;
  }

  .badge-published {
    background-color: var(--primary-dark);
    color: #fff;
    font-size: .75rem;
    border-radius: .5rem;
    padding: .25rem .5rem;
  }

  .badge-draft {
    background-color: var(--gray-600);
    color: #fff;
    font-size: .75rem;
    border-radius: .5rem;
    padding: .25rem .5rem;
  }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8 justify-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4 justify-center">Notícias</h1>
        <p class=" font-bold text-gray-500 mb-4 justify-center">Esteja atualizado com mais artigos e histórias recentes.</p> <br>

        {{-- Formulário de busca --}}
        <form method="GET" action="{{ route('news.index') }}" class="max-w-md">
            <div class="flex gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar notícias..."
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                 <button class="btn btn-primary w-100">
          <i class="bi bi-search"></i> Filtrar
        </button>
        <a href="{{ route('news.index') }}" class="btn btn-outline-secondary w-100">
          Limpar
        </a>
            </div>
        </form>
    </div> <br>

    @if($news->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($news as $item)
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl
transition">
                    @if($item->image)
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->title }}"
                            class="w-full h-48 object-cover"
                        >
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Sem imagem</span>
                        </div>
                    @endif

                    <div class="p-5">
                        <div class="text-sm text-gray-500 mb-2">
                            {{ $item->published_at->format('d/m/Y H:i') }} • Por {{ $item->author
}}
                        </div>

                        <h2 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600">
                            <a href="{{ route('news.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h2>

                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($item->summary, 120) }}
                        </p>

                        <a
                            href="{{ route('news.show', $item->slug) }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold"
                        >
                            Ler mais →
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        {{-- Paginação --}}
        <div class="mt-8">
            {{ $news->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">Nenhuma notícia encontrada.</p>
        </div>
    @endif
</div>
@endsection
