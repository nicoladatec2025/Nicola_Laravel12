@extends('layouts.admin')

@section('content')
   <h2>Editar Transação</h2>

<form action="{{ route('transactions.update', $transaction->id) }}" method="GET">
    @csrf
    @method('GET')

    <label>Descrição:</label>
    <input type="text" name="descricao" value="{{ old('descricao', $transaction->descricao) }}" ><br>

    <label>Tipo:</label>
    <select name="tipo" required>
        <option value="entrada" {{ old('tipo', $transaction->tipo)=='entrada' ? 'selected' : '' }}>Entrada</option>
        <option value="saida" {{ old('tipo', $transaction->tipo)=='saida' ? 'selected' : '' }}>Saída</option>
    </select><br>

    <label>Valor:</label>
    <input type="number" step="0.01" name="valor" value="{{ old('valor', $transaction->valor) }}"><br>

    <label>Data da Transação:</label>
    <input type="datetime-local" name="data_transacao" value="{{  old('data_transacao', $transaction->data_transacao) }}"><br>

    <label>Categoria:</label>
    <input type="text" name="categoria" value="{{ old('categoria', $transaction->categoria) }}"><br>

    <label>Método de Pagamento:</label>
    <input type="text" name="metodo_pagamento" value="{{ old('metodo_pagamento', $transaction->metodo_pagamento) }}"><br>

    <label>Referência:</label>
    <input type="text" name="referencia" value="{{ old('referencia', $transaction->referencia) }}"><br>

    <label>Observação:</label>
    <textarea name="observacao">{{ old('observacao', $transaction->observacao) }}</textarea><br>

    <button type="submit">Atualizar</button>
</form>
@endsection
