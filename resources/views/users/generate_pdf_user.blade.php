<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NicolaDaTec</title>

    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { text-align: center; border-bottom: 2px solid #000; margin-bottom: 20px; }
        .header img { max-height: 70px; }
        .empresa { margin-top: -20px; }
        .titulo { text-align: center; font-size: 16px; margin: 20px 0; font-weight: bold; }
        .conteudo { margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #000; padding: 6px; }



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

<body >


<div class="header">

        <div class="empresa">
            <strong>NICOLA DA TEC - PRESTAÇÃO DE SERVIÇOS, LDA</strong><br>
            NIF: 5002537540<br>
             Bairro-Floresta, Benfica-Ramiros Rua nº km26 - Luanda<br>
            Tel: +244 938 033 192 | Email: nicoladatec@gmail.com
        </div>
    </div>



<div class="titulo">Usuário</div>

 <table>
    <thead>
         <tr>
    <th>ID</th> <br>
    <th> Nome</th> <br>
     <th>E-mail</th> <br>
     <th>Data de Cadastrado</th> <br>
 </tr>
 </thead>
 <tbody>
      <tr>
     <td>{{ $user->id }}</td> <br>
    <td> {{ $user->name }}</td> <br>
     <td>{{ $user->email }}</td> <br>
     <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</td> <br>
      </tr>
</tbody>
 </table>

     <footer>
        <P> Documento electrônico dispensa assinatura | Nicola Da Tec</P><br>
Documento gerado automaticamente | Armazenado por computador: {{ date('d/m/Y H:i:s') }}
     </footer>
</body>

</html>
