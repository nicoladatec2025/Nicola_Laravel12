<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de Preços</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; border-bottom: 2px solid #000; margin-bottom: 20px; }
        .header img { max-height: 70px; }
        .empresa { margin-top: -20px; }
        .titulo { text-align: center; font-size: 16px; margin: 20px 0; font-weight: bold; }
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

    <h1 class="titulo"> Lista de Preços</h1>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Valor_à_pagar</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($precos as $preco)
                <tr>
                    <td>{{ $preco->item }}</td>
                    <td> {{ number_format($preco->valor, 2, ',', '.') }} Kz</td>
                    <td>{{ $preco->descricao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        
Nicola Da Tec | Armazenado por computador: {{ date('d/m/Y H:i:s') }}
     </footer>

</body>
</html>
