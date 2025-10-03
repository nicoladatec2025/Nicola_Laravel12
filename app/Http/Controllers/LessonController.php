<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // Listar as aulas
    public function index()
    {
        // Carregar a view
        return view('lessons.index');
    }

    // Carregar o formulário cadastrar nova aula
    public function create()
    {
        // Carregar a view
        return view('lessons.create');
    }

    // Cadastrar no banco de dados o nova aula
    public function store(Request $request)
    {
        // dd($request);
        // Cadastrar no banco de dados na tabela aula
        Lesson::create([
            'name' => $request->name
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('lessons.index')->with('success', 'Aula cadastrada com sucesso!');
    }
}

