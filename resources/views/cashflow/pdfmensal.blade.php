<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fluxo de Caixa Mensal</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Fluxo de Caixa Mensal</h2>
    <p>Período: {{ $startOfMonth->format('d/m/Y') }} - {{ $endOfMonth->format('d/m/Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->descricao }}</td>
                    <td>{{ ucfirst($transaction->tipo) }}</td>
                    <td> {{ number_format($transaction->valor, 2, ',', '.') }} Kz</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->data_transacao)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Resumo</h3>
    <p><strong>Total de Entradas:</strong> {{ number_format($entradas, 2, ',', '.') }} Kz</p>
    <p><strong>Total de Saídas:</strong> {{ number_format($saidas, 2, ',', '.') }} Kz</p>
    <p><strong>Saldo:</strong> {{ number_format($saldo, 2, ',', '.') }} Kz</p>
</body>
</html>
