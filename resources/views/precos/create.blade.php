@extends('layouts.admin')

@section('content')
   <h2>Cadastrar Novo Preço</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tabela_precos.store') }}" method="POST">
    @csrf
    <label for="item">Item:</label>
    <input type="text" name="item" id="item" required><br><br>

    <label for="valor">Valor:</label>
    <input type="number" step="0.01" name="valor" id="valor" required><br><br>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao" required></textarea><br><br>

    <button type="submit">Salvar</button>
</form>
@endsection

