@extends('layouts.admin')
@section('title', 'Gerenciar Notícias')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Gerenciar Notícias</h1>

        <a
            href="{{ route('admin.news.create') }}"
            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
        >
            + Nova Notícia
        </a>
    </div>
    {{-- Mensagens de feedback --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    {{-- Filtros --}}
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <form method="GET" action="{{ route('admin.news.index') }}" class="flex gap-4">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por título..."
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg"
            >

            <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg">
                <option value="">Todos os status</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' :
'' }}>
                    Publicadas
                </option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>
                    Rascunhos
                </option>
            </select>

            <button type="submit" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bggray-700">
                Filtrar
            </button>
        </form>
    </div>
    {{-- Tabela de notícias --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500
uppercase">Título</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500
uppercase">Autor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500
uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500
uppercase">Data</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500
uppercase">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($news as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $item->title }}
</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($item->summary,
50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->author }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->is_published)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold
rounded-full bg-green-100 text-green-800">
                                    Publicado
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold
rounded-full bg-yellow-100 text-yellow-800">
                                    Rascunho
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm fontmedium">
                            <form method="POST" action="{{ route('admin.news.toggle-publish',
$item) }}" class="inline">
                                @csrf
                                <button
                                    type="submit"
                                    class="text-blue-600 hover:text-blue-900 mr-3"
                                >
                                    {{ $item->is_published ? 'Despublicar' : 'Publicar' }}
                                </button>
                            </form>

                            <a href="{{ route('admin.news.edit', $item) }}" class="textindigo-600 hover:text-indigo-900 mr-3">
                                Editar
                            </a>

                            <form method="POST" action="{{ route('admin.news.destroy', $item)
}}" class="inline" onsubmit="return confirm('Tem certeza que deseja deletar esta notícia?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Nenhuma notícia encontrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Paginação --}}
    <div class="mt-6">
        {{ $news->links() }}
    </div>
</div>
@endsection
