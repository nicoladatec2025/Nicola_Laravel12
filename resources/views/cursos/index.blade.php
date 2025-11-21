@extends('layouts.app')

@section('title','Cursos Disponíveis')

@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 3rem 2rem;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 3rem;
    }

    .page-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .course-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .course-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 1rem;
        text-align: center;
    }

    .course-header h3 {
        font-size: 1.5rem;

    }

    .course-body {
        padding: 2rem;
    }

    .course-info {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

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

    .badge {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: bold;
    }



    .price {
        font-size: 2rem;
        font-weight: bold;
        color: #3873ca;
        text-align: center;
        margin: 0;
    }

    .btn-inscrever {
        display: block;
        width: 100%;
        padding: 1rem;
        background-color: #2a5298;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: all 0.3s;
    }

    .btn-inscrever:hover {
        background-color: #1e3c72;
    }
</style>

<div class="page-header">
    <h1>Nossos Cursos</h1>
    <p>Aprenda com os melhores profissionais do mercado</p>
</div>

<div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-blue-700">Cursos Disponíveis</h1>

    <!-- Início Formulário de Pesquisa -->
        <form method="GET" class="form-search">
            <input class="form-input" name="q" value="{{ request('q') }}" placeholder="Pesquisar..." >

            <select name="categoria" class="px-3 py-2 border border-gray-300 rounded-md bg-white">
            <option value="">Categoria</option>
            @foreach(['Web','Dados','DevOps'] as $cat)
                <option value="{{ $cat }}" @selected(request('categoria') === $cat)>{{ $cat }}</option>
            @endforeach
        </select>
        <select name="nivel" class="px-3 py-2 border border-gray-300 rounded-md bg-white">
            <option value="">Nível</option>
            @foreach(['iniciante','intermediário','avançado'] as $niv)
                <option value="{{ $niv }}" @selected(request('nivel') === $niv)>{{ ucfirst($niv) }}</option>
            @endforeach
        </select>

            <div class="flex gap-1">
                <button type="submit" class="btn-primary flex items-center space-x-1">
                    <!-- Ícone magnifying-glass (Heroicons) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <span>Pesquisar</span>
                </button>
                <a href="{{ route('cursos.index') }}" type="submit" class="btn-warning flex items-center space-x-1">
                    <!-- Ícone trash (Heroicons) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    <span>Limpar</span>
                </a>
            </div>
        </form>
        </div><br>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($cursos as $curso)
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">

            <div class="p-4">

               <div class="course-header"> <h3>{{ $curso->titulo }}</h3> </div>

               @if($curso->imagem_url)
                <img src="{{ $curso->imagem_url }}" alt="{{ $curso->titulo }}" class="w-full h-40 object-cover">
            @endif

               <div class="course-body">
            <div class="course-info">
                <p class="info-item">{{ Str::limit($curso->descricao, 120) }}</p>
             </div>
            <div class="info-item">
                    <span class="info-label">Duração:</span>
                    <span class="info-value">{{ $curso->carga_horaria }} Horas</span>
                </div>
            </div>

                   <div class="price">Kz {{ number_format($curso->preco, 2, ',', '.') }}</div>
                   <a href="{{ route('contacto') }}" class="btn-inscrever">Inscrever-se</a>

            </div>
        </div>
    @empty
        <p class="text-gray-600">Nenhum curso encontrado.</p>
    @endforelse
</div> <br>

<div class="mt-6">
    {{ $cursos->links() }}
</div>
<x-alert />
@endsection
