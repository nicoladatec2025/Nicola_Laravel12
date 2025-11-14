<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de Preços</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Lista de Preços</h2>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Valor</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($precos as $preco)
                <tr>
                    <td>{{ $preco->item }}</td>
                    <td>R$ {{ number_format($preco->valor, 2, ',', '.') }}</td>
                    <td>{{ $preco->descricao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
