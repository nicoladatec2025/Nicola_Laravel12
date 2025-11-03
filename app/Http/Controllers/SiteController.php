<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{

    public function inicio()
    {
        return view('site.inicio');
    }

    public function sobre()
    {
        return view('site.sobre');
    }

    public function contacto()
    {
        return view('site.contacto');
    }

    public function enviarContacto(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'mensagem' => 'required|string|min:10'
        ]);

        // Aqui você pode implementar o envio de email
        // Mail::to('seu@email.com')->send(new ContatoMail($request->all()));

        return redirect()->route('contacto')->with('success', 'Mensagem enviada com sucesso!');
    }

    public function servicos()
    {
        $servicos = [
            [
                'titulo' => 'Desenvolvimento Web',
                'descricao' => 'Criação de sites e sistemas administrativos modernos e responsivos com as melhores tecnologias do mercado, por apenas uma semana.',
                'icone' => '💻'
            ],
            [
                'titulo' => 'Syber Café',
                'descricao' => 'Digitalização, impressão, copias, encadernação de trabalhos escolares, monografias e projetos prático',
                'icone' => '🎯'
            ],
            [
                'titulo' => 'Manutenção de Sistemas e cumputadores',
                'descricao' => 'Suporte contínuo e manutenção preventiva para seus sistemas, sites e computadores.',
                'icone' => '🔧'
            ],
            [
                'titulo' => 'Vendas de produtos diversos',
                'descricao' => 'Vendemos materias de escritório e escolar.',
                'icone' => '🚚'
            ]
        ];

        return view('site.servicos', compact('servicos'));
    }

    public function cursos()
    {
        $cursos = [


            [
               'titulo' => 'Informática',
                'duracao' => '32 horas',
                'nivel' => 'Iniciante',
                'preco' => '15.000,00 KZ'
            ],
            [
               'titulo' => 'Excel',
                'duracao' => '32 horas',
                'nivel' => 'Avançado',
                'preco' => '20.000,00 KZ'
            ],
            [
               'titulo' => 'HardWare',
                'duracao' => '32 horas',
                'nivel' => 'Iniciante',
                'preco' => '15.000,00 KZ'
            ],
                        [
               'titulo' => 'Design Gráfico',
                'duracao' => '32 horas',
                'nivel' => 'Intermediário',
                'preco' => '20.000,00 KZ'
            ],

            [
                'titulo' => 'PHP Fundamentos',
                'duracao' => '32 horas',
                'nivel' => 'Intermediário',
                'preco' => '25.000,00 KZ'
            ],

              [
                'titulo' => 'Laravel Avançado',
                'duracao' => '40 horas',
                'nivel' => 'Avançado',
                'preco' => '30.000,00 KZ'
            ],

            [
                'titulo' => 'Base de dados MySQL',
                'duracao' => '32 horas',
                'nivel' => 'Intermediário',
                'preco' => '20.000,00 KZ'
            ],

            [
                'titulo' => 'Pedagogia',
                'duracao' => '20 horas',
                'nivel' => 'Iniciante',
                'preco' => '10.000,00 KZ'
            ],

            [
                'titulo' => 'Atendimento ao publico',
                'duracao' => '20 horas',
                'nivel' => 'Iniciante',
                'preco' => '10.000,00 KZ'
            ],

             [
                'titulo' => 'Oratória',
                'duracao' => '20 horas',
                'nivel' => 'Iniciante',
                'preco' => '10.000,00 KZ'
            ],

            [
                'titulo' => 'Inglês',
                'duracao' => '48 horas',
                'nivel' => 'Iniciante',
                'preco' => '18.000,00 KZ'
            ]
        ];

        return view('site.cursos', compact('cursos'));
    }
}
