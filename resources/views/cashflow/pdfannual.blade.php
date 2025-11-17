<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Transações Anual</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; border-bottom: 2px solid #000; margin-bottom: 20px; }
        .header img { max-height: 70px; }
        .empresa { margin-top: -20px; }
         .titulo { text-align: center; font-size: 16px; margin: 20px 0; font-weight: bold; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #f2f2f2;  border: 1px solid #000; padding: 8px; text-align: center; }
        td { border: 1px solid #000; padding: 8px; text-align: left; }


        footer {
 position: fixed;
 bottom: -30px;
left: 0;
 right: 0;
 text-align: center;
 font-size: 12px;
 color: #000;
 padding: 6px;
 }
    </style>
</head>
<body>

<div class="header">

        <div class="empresa">
            <strong>NICOLA DA TEC - PRESTAÇÃO DE SERVIÇOS, LDA</strong><br>
            NIF: 5002537540<br>
             Bairro-Floresta, Benfica-Ramiros Rua nº km26 - Luanda<br>
            Tel: +244 938 033 192 | Email: nicoladatec@gmail.com
        </div>
    </div>

    </style>
</head>
<body>
    <h1 class="titulo" >Transações Anual</h1>
    <p>Período: {{ $startOfYear->format('d/m/Y') }} - {{ $endOfYear->tz('America/Sao_Paulo')->format('d/m/Y') }}</p>

    <table>
        <thead>
            <tr>
               <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->descricao }}</td>
                    <td>{{ ucfirst($transaction->tipo) }}</td>
                    <td> {{ number_format($transaction->valor, 2, ',', '.') }} Kz</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->data_transacao)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Resumo do Ano</h3>
    <p><strong>Total de Entradas:</strong> {{ number_format($entradas, 2, ',', '.') }} Kz</p>
    <p><strong>Total de Saídas:</strong> {{ number_format($saidas, 2, ',', '.') }} Kz</p>
    <p><strong>Saldo Final:</strong> {{ number_format($saldo, 2, ',', '.') }} Kz</p>

<footer>
        
Nicola Da Tec | Armazenado por computador: {{ date('d/m/Y H:i:s') }}
     </footer>
    
    </body>
</html>
