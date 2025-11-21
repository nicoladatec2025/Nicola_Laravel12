@extends('layouts.admin')

@section('title','Admin • Cursos')

@section('content')

<style>

    .info-item {
        display: flex;
        justify-content: space-between;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #eee;
    }

    .info-label {
        font-weight: bold;
        color: #1e3c72;
    }

    .info-value {
        color: #666;
    }

</style>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-blue-700">Gerência de Cursos</h1>
    <div class="flex gap-2">
        <a href="{{ route('admin.cursos.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Novo Curso</a>
        <form method="GET">
            <label class="inline-flex items-center gap-2 text-gray-700">
                <input type="checkbox" name="somenteativos" value="1" @checked(request('somenteativos'))>
                Somente ativos
            </label>
        </form>
    </div>
</div>


<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
@foreach($cursos as $curso)
    <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm">
        <div class="flex items-start justify-between">
            <h3 class="text-lg font-semibold text-gray-900">{{ $curso->titulo }}</h3>
            <span class="text-sm {{ $curso->ativo ? 'text-blue-700' : 'text-gray-500' }}">
                {{ $curso->ativo ? 'Ativo' : 'Inativo' }}
            </span>
        </div>
        <p class="mt-2 text-gray-600 line-clamp-2">{{ Str::limit($curso->descricao, 120) }}</p>
        <div class="info-item">
                    <span class="info-label">Duração:</span>
                    <span class="info-value">{{ $curso->carga_horaria }} Horas</span>
                </div>
        <div class="mt-4 flex items-center justify-between">
            <span class="font-bold text-blue-700">Kz {{ number_format($curso->preco, 2, ',', '.') }}</span>
            <div class="flex gap-2">
                <a href="{{ route('admin.cursos.edit', $curso) }}" class="px-3 py-2 rounded border border-gray-300 text-gray-700 hover:bg-gray-50">Editar</a>
                <form method="POST" action="{{ route('admin.cursos.toggle', $curso) }}">
                    @csrf @method('PATCH')
                    <button class="px-3 py-2 rounded border border-gray-300 text-gray-700 hover:bg-gray-50">
                        {{ $curso->ativo ? 'Desativar' : 'Ativar' }}
                    </button>
                </form>
                <form method="POST" action="{{ route('admin.cursos.destroy', $curso) }}" onsubmit="return confirm('Remover curso?')">
                    @csrf @method('DELETE')
                    <button class="px-3 py-2 rounded border border-red-300 text-red-700 hover:bg-red-50">Remover</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>

<div class="mt-6">
    {{ $cursos->links() }}
</div>
@endsection
