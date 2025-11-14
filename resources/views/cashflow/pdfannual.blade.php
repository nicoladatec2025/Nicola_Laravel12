<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fluxo de Caixa Anual</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Fluxo de Caixa Anual</h2>
    <p>Período: {{ $startOfYear->format('d/m/Y') }} - {{ $endOfYear->format('d/m/Y') }}</p>

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
                    <td>R$ {{ number_format($transaction->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->data_transacao)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Resumo do Ano</h3>
    <p><strong>Total de Entradas:</strong> R$ {{ number_format($entradas, 2, ',', '.') }}</p>
    <p><strong>Total de Saídas:</strong> R$ {{ number_format($saidas, 2, ',', '.') }}</p>
    <p><strong>Saldo Final:</strong> R$ {{ number_format($saldo, 2, ',', '.') }}</p>
</body>
</html>
