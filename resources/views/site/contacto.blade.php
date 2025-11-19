@extends('layouts.app')

@section('title', 'Contacto-Nicola-Da-Tec')

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

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
    }

    .contact-form {
        background: white;
        padding: 2.5rem;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .contact-form h2 {
        color: #1e3c72;
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #333;
        font-weight: 500;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #2a5298;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .btn-submit {
        width: 100%;
        padding: 1rem;
        background-color: #2a5298;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background-color: #1e3c72;
    }

    .contact-info {
        background: white;
        padding: 2.5rem;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .contact-info h2 {
        color: #1e3c72;
        margin-bottom: 2rem;
    }

    .info-block {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background-color: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #2a5298;
    }

    .info-block h3 {
        color: #1e3c72;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .info-block p {
        color: #666;
        margin: 0;
    }

    .alert {
        padding: 1rem;
        margin-bottom: 1.5rem;
        border-radius: 5px;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }

    .error {
        color: #d32f2f;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    @media (max-width: 768px) {
        .contact-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <h1>Entre em Contacto</h1>
    <p>Estamos prontos para ajudá-lo</p>
</div>

<div class="contact-container">
    <div class="contact-form">
        <h2>Envie-nos uma Mensagem</h2>

        @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('contacto.enviar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome Completo *</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
                @error('nome')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="mensagem">Mensagem *</label>
                <textarea id="mensagem" name="mensagem" required>{{ old('mensagem') }}</textarea>
                @error('mensagem')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-submit">Enviar Mensagem</button>
        </form>
    </div>

    <div class="contact-info">
        <h2>Informações de Contacto</h2>

        <div class="info-block">
            <h3>📧 Email</h3>
            <p>nicoladatec@gmail.com</p>
            <p>augustonicolau417@gmail.com</p>
        </div>

        <div class="info-block">
            <h3>📞 Telefone</h3>
            <p>+244 938 033 192</p>
            <p>+244 951 596 510</p>
        </div>

        <div class="info-block">
            <h3>📍 Endereço</h3>
            <p>Benfica-Ramiros, Bairro-Floresta, Km_26</p>
            <p>Luanda, Angola</p>
        </div>

        <div class="info-block">
            <h3>🕐 Horário de Atendimento</h3>
            <p>Segunda a Sabado: 07:00 - 20:00</p>
            <p>Domingo: 13:00 - 20:00</p>
        </div>
    </div>
</div>
@endsection
