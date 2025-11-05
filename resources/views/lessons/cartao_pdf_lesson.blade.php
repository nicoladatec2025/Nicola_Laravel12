<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NicolaDaTec</title>

    <style>



        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; }



        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .logo {
            font-size: 18px;
            font-weight: bold;
        }

        .foto {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 3px solid white;
            object-fit: cover;
            background: white;
        }



        .cartao {

            width: 85.6mm;
            height: 52mm;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            margin-top: 30px;
            margin-left: 30px;
        }



        /* VERSO */
        .verso {
            background: white;
            border: 2px solid #5b5b5b;
            padding: 15px;
            text-align: center;

        }



        .info-verso {

            font-size: 12px;
            color: #333;
            margin-top: 8ch;
            margin-left: 20px;
            text-align: left;
        }

        .emergencia {
            margin-top: 8px;
            padding: 8px;
            background: #a5a58aff;
            border-radius: 4px;
            font-size: 14px;
            text-align: left;
        }
 </style>

    </head>

<body >

    <!-- VERSO -->

    <div class="cartao verso">

      <h3 style="color: #3873ca; font-size: 12px;">NICOLA DA TEC - PRESTAÇÃO DE SERVIÇOS, LDA</h3>
         <h4 style="color: #303b4bff; font-size: 10px; text-align: left;">Cartão do Formando</h4>
        <br> <p style=" text-align: left;" >Nº {{ $lesson->id }}{{\Carbon\Carbon::parse($lesson->created_at)->format('dmY') }}</p>
         <div class="emergencia">
            <strong style="color: #3873ca; font-size: 14px;">Nome: {{ $lesson->module->courseBatch->course->name}}</strong>
        </div>

        <div class="info-verso">
           <p>Curso: {{ $lesson->module->courseBatch->name }}</p>
           <p>Nível: {{ $lesson->name }}</p>
           <p>Truma: {{ $lesson->module->name }}</p> <br>
        </div>

        <p style="font-size: 8px; margin-top: 8px; color: #999; text-align: left">
        Cadastrado: {{ \Carbon\Carbon::parse($lesson->created_at)->format('d/m/Y') }} |
         Actualizado: {{ \Carbon\Carbon::parse($lesson->updated_at)->format('d/m/Y') }}
        </p>
        <p style="font-size: 8px; margin-top: 8px; color: #999; text-align: left">
         Válido: até 6 Meses | | Em caso de emergencia ligue para: +244 938 033
        </p>


    </div>


</body>

</html>
