@extends('layouts.admin')

@section('content')
    <h2>Criar Transação</h2>

<form action="{{ route('transactions.store') }}" method="GET">
    @csrf

    <label>Descrição:</label>
    <input type="text" name="descricao" value="{{ old('descricao') }}" required><br>

    <label>Tipo:</label>
    <select name="tipo" required>
        <option value="entrada" {{ old('tipo')=='entrada' ? 'selected' : '' }}>Entrada</option>
        <option value="saida" {{ old('tipo')=='saida' ? 'selected' : '' }}>Saída</option>
    </select><br>

    <label>Valor:</label>
    <input type="number" step="0.01" name="valor" value="{{ old('valor') }}" required><br>

    <label>Data da Transação:</label>
    <input type="datetime-local" name="data_transacao" value="{{ old('data_transacao') }}" required><br>

    <label>Categoria:</label>
    <input type="text" name="categoria" value="{{ old('categoria') }}"><br>

    <label>Método de Pagamento:</label>
    <input type="text" name="metodo_pagamento" value="{{ old('metodo_pagamento') }}"><br>

    <label>Referência:</label>
    <input type="text" name="referencia" value="{{ old('referencia') }}"><br>

    <label>Observação:</label>
    <textarea name="observacao">{{ old('observacao') }}</textarea><br>

    <button type="submit">Salvar</button>
</form>
@endsection
