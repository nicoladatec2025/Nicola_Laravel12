@extends('layouts.admin')

@section('content')

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Tabela de Preços</h3>
        <a href="{{ route('precos.create') }}" class="btn btn-primary">Cadastrar Novo Preço</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($precos as $preco)
                        <tr>
                            <td>{{ $preco->item }}</td>
                            <td>R$ {{ number_format($preco->valor, 2, ',', '.') }}</td>
                            <td>{{ $preco->descricao }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('precos.edit', $preco->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <!-- Exemplo: botão excluir (opcional) -->
                                {{--
                                <form action="{{ route('precos.destroy', $preco->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                                --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
