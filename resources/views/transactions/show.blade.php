@extends('layouts.admin')

@section('content')
    <h2>Detalhes da Transação{{ $transaction->id }}</h2>

<ul>
    <li><strong>Descrição:</strong> {{ $transaction->descricao }}</li>
    <li><strong>Tipo:</strong> {{ ucfirst($transaction->tipo) }}</li>
    <li><strong>Valor:</strong> Ks{{ number_format((float)$transaction->valor, 2, ',', '.') }}</li>
    <li><strong>Data:</strong> {{  \Carbon\Carbon::parse($transaction->data_transacao)->tz('Africa/Luanda')->format('d/m/Y H:i') }}</li>
    <li><strong>Categoria:</strong> {{ $transaction->categoria }}</li>
    <li><strong>Método de Pagamento:</strong> {{ $transaction->metodo_pagamento }}</li>
    <li><strong>Referência:</strong> {{ $transaction->referencia }}</li>
    <li><strong>Observação:</strong> {{ $transaction->observacao }}</li>
</ul>

<a href="{{ route('transactions.edit', $transaction->id) }}">Editar</a> |
<a href="{{ route('transactions.index') }}">Voltar à lista</a>
@endsection
