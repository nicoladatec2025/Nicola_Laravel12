@extends('layouts.admin')

@section('content')
    <!-- Título e Trilha de Navegação -->
    <div class="content-wrapper">
        <div class="content-header">
            <h2 class="content-title">Preço</h2>
            <nav class="breadcrumb">
                <a href="{{ route('dashboard.index') }}" class="breadcrumb-link">Dashboard</a>
                <span>/</span>
                <a href="{{ route('precos.index') }}" class="breadcrumb-link">Preços</a>
                <span>/</span>
                <span>Preço</span>
            </nav>
        </div>
    </div>

    <div class="content-box">
        <div class="content-box-header">
            <h3 class="content-box-title">Cadastrar</h3>
            <div class="content-box-btn">
                @can('index-user')
                    <a href="{{ route('precos.index') }}" class="btn-info align-icon-btn">
                        <!-- Ícone queue-list (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                        <span>Listar</span>
                    </a>
                @endcan
            </div>
        </div>

        <x-alert />
        <form action="{{ route('precos.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="item" class="form-label">Item</label>
                <input type="text" name="item" id="item" class="form-input"
                    placeholder="Nome do Item" required>
            </div>

            <div class="mb-4">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" step="0.01" name="valor" id="valor" class="form-input"
                    placeholder="Valor do custo" required>
            </div>

            <div class="mb-4">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-input" name="descricao" id="descricao" required></textarea><br><br>
            </div>

            
             </div>

            <button type="submit" class="btn-success align-icon-btn">
                <!-- Ícone plus-circle (Heroicons) -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Cadastrar</span>
            </button>

        </form>

    </div>
@endsection
