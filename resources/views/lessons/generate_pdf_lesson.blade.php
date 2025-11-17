<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NicolaDaTec</title>

    <style>
         body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; border-bottom: 2px solid #000; margin-bottom: 20px; }
        .header img { max-height: 70px; }
        .empresa { margin-top: -20px; }
         .titulo { text-align: center; font-size: 16px; margin: 20px 0; font-weight: bold; }
        .titulo { text-align: center; font-size: 16px; margin: 20px 0; font-weight: bold; }
        .conteudo { margin: 30px;  font-size: 16px; margin: 20px 0;}
       

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

<div class="titulo">Comprovativo de Matricula</div>

<div class="detail-box conteudo">

            <div class="mb-1">
                <span class="title-detail-content"><strong>Processo:</strong></span>
                <span class="detail-content">{{ $lesson->id }}{{\Carbon\Carbon::parse($lesson->created_at)->format('dmY')}}</span>
            </div>
            
            <div class="mb-1">
                <span class="title-detail-content"><strong>Formando(a):</strong> </span>
                <span class="detail-content">{{ $lesson->module->courseBatch->course->name }}</span>
            </div>
            
            <div class="mb-1">
                <span class="title-detail-content"><strong>Nível: </strong></span>
                <span class="detail-content">{{ $lesson->name }}</span>
            </div>
         
            <div class="mb-1">
                <span class="title-detail-content"><strong>Turma: </strong></span>
                <span class="detail-content">{{ $lesson->module->name }}</span>
            </div>

            <div class="mb-1">
                <span class="title-detail-content"><strong>Curso:</strong> </span>
                <span class="detail-content">{{ $lesson->module->courseBatch->name }}</span>
            </div><br>

            
            <div class="mb-1">
                <span class="title-detail-content"><strong>Data de Cadastro</strong></span>
                <span class="detail-content">{{ \Carbon\Carbon::parse($lesson->created_at)->format('d/m/Y H:i:s') }}</span>
            </div>

            <div class="mb-1">
                <span class="title-detail-content"><strong>Data de Actualização:</strong> </span>
                <span class="detail-content">{{ \Carbon\Carbon::parse($lesson->updated_at)->format('d/m/Y  H:i:s') }}</span>
            </div>

        </div>


     <footer>
        
Nicola Da Tec | Armazenado por computador: {{ date('d/m/Y H:i:s') }}
     </footer>
</body>

</html>
