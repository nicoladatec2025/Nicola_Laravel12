<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Transação #{{ $transaction->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>
    <h2>Detalhes da Transação </h2>
    <table>
        <tr><th>ID</th><td>{{ $transaction->id  }}</td></tr>
        <tr><th>Descrição</th><td>{{ $transaction->descricao }}</td></tr>
        <tr><th>Tipo</th><td>{{ ucfirst($transaction->tipo) }}</td></tr>
        <tr><th>Valor</th><td> {{ number_format($transaction->valor, 2, ',', '.') }} Kz </td></tr>
        <tr><th>Data</th><td>{{ \Carbon\Carbon::parse($transaction->data_transacao)->format('d/m/Y') }}</td></tr>
        <tr><th>Categoria</th><td>{{ $transaction->categoria }}</td></tr>
        <tr><th>Método de Pagamento</th><td>{{ $transaction->metodo_pagamento }}</td></tr>
        <tr><th>Referência</th><td>{{ $transaction->referencia }}</td></tr>
        <tr><th>Observação</th><td>{{ $transaction->observacao }}</td></tr>
    </table>
</body>
</html>
