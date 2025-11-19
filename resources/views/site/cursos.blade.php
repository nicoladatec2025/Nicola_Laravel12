@extends('layouts.app')

@section('title', 'Cursos-Nicola-Da-Tec')

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
        padding: 2rem;
        text-align: center;
    }

    .course-header h3 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
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

    .badge-iniciante {
        background-color: #4caf50;
        color: white;
    }

    .badge-intermediario {
        background-color: #ff9800;
        color: white;
    }

    .badge-avancado {
        background-color: #f44336;
        color: white;
    }

    .price {
        font-size: 2rem;
        font-weight: bold;
        color: #1e3c72;
        text-align: center;
        margin: 1rem 0;
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

<div class="courses-grid">
    @foreach($cursos as $curso)
    <div class="course-card">
        <div class="course-header">
            <h3>{{ $curso['titulo'] }}</h3>
        </div>
        <div class="course-body">
            <div class="course-info">
                <div class="info-item">
                    <span class="info-label">Duração:</span>
                    <span class="info-value">{{ $curso['duracao'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Nível:</span>
                    <span class="badge
                        @if($curso['nivel'] == 'Iniciante') badge-iniciante
                        @elseif($curso['nivel'] == 'Intermediário') badge-intermediario
                        @else badge-avancado
                        @endif
                    ">
                        {{ $curso['nivel'] }}
                    </span>
                </div>
            </div>

            <div class="price">{{ $curso['preco'] }}</div>

            <a href="{{ route('contacto') }}" class="btn-inscrever">Inscrever-se</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
