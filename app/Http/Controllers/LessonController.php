<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use Exception;

class LessonController extends Controller
{
    // Listar as aulas
    public function index()
    {
        // Recuperar os registros do banco dados
        $lessons = Lesson::orderBy('id', 'DESC')->paginate(10);

        // Carregar a view 
        return view('lessons.index', ['lessons' => $lessons]);
    }

    // Visualizar os detalhes da aula
    public function show(Lesson $lesson)
    {
        // Carregar a view 
        return view('lessons.show', ['lesson' => $lesson]);
    }

    // Carregar o formulário cadastrar nova aula
    public function create()
    {
        // Carregar a view 
        return view('lessons.create');
    }

    // Cadastrar no banco de dados o nova aula
    public function store(LessonRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela aula
            Lesson::create([
                'name' => $request->name
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.index')->with('success', 'Aula cadastrada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Aula não cadastrada!');
        }
    }

    // Carregar o formulário editar aula
    public function edit(Lesson $lesson)
    {
        // Carregar a view 
        return view('lessons.edit', ['lesson' => $lesson]);
    }

    // Editar no banco de dados o aula
    public function update(LessonRequest $request, Lesson $lesson)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $lesson->update([
                'name' => $request->name
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.show', ['lesson' => $lesson->id])->with('success', 'Aula editada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Aula não editada!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(Lesson $lesson)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $lesson->delete();
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.index')->with('success', 'Aula apagada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Aula não apagada!');
        }
    }
}
