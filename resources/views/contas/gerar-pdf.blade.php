<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Contas a pagar</title>

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

<body style="font-size: 12px;">

<div class="header">

        <div class="empresa">
            <strong>NICOLA DA TEC - PRESTAÇÃO DE SERVIÇOS, LDA</strong><br>
            NIF: 5002537540<br>
             Bairro-Floresta, Benfica-Ramiros Rua nº km26 - Luanda<br>
            Tel: +244 938 033 192 | Email: nicoladatec@gmail.com
        </div>
    </div>

    <h2 style="text-align: center">Contas a pagar</h2>

    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #adb5bd;">
           
                <th style="border: 1px solid #ccc;">Nome</th>
                <th style="border: 1px solid #ccc;">Vencimento</th>
                <th style="border: 1px solid #ccc;">Situação</th>
                <th style="border: 1px solid #ccc;">Valor</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($contas as $conta)
                <tr>
                    
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $conta->nome }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $conta->situacaoConta->nome }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ number_format($conta->valor, 2, ',', '.') }} Kz</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma conta encontrada!</td>
                </tr>
            @endforelse

            <tr>
                <td colspan="3" style="border: 1px solid #ccc; border-top: none;">Total</td>
                <td style="border: 1px solid #ccc; border-top: none;">{{ number_format($totalValor, 2, ',', '.') }} Kz</td>
            </tr>
        </tbody>

    </table>

    <footer>
        
Nicola Da Tec | Armazenado por computador: {{ date('d/m/Y H:i:s') }}
     </footer>

</body>

</html>
