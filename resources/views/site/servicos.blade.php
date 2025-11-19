@extends('layouts.app')

@section('title', 'Serviços-Nicola-Da-Tec')

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

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
    }

    .service-card {
        background: white;
        padding: 2.5rem;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s;
        border-top: 4px solid #2a5298;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .service-icon {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        display: block;
    }

    .service-card h3 {
        color: #1e3c72;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }

    .service-card p {
        color: #666;
        line-height: 1.8;
    }

    .btn-service {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.7rem 1.5rem;
        background-color: #2a5298;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .btn-service:hover {
        background-color: #1e3c72;
    }
</style>

<div class="page-header">
    <h1>Nossos Serviços</h1>
    <p>Soluções completas para suas necessidades tecnológicas</p>
</div>

<div class="services-grid">
    @foreach($servicos as $servico)
    <div class="service-card">
        <span class="service-icon">{{ $servico['icone'] }}</span>
        <h3>{{ $servico['titulo'] }}</h3>
        <p>{{ $servico['descricao'] }}</p>
        <a href="{{ route('contacto') }}" class="btn-service">Solicitar Orçamento</a>
    </div>
    @endforeach
</div>
@endsection
