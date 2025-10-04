<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseBatchRequest;
use App\Models\CourseBatch;
use Exception;

class CourseBatchController extends Controller
{
    // Listar as turmas dos cursos
    public function index()
    {
        // Recuperar os registros do banco dados
        $coursesBatches = CourseBatch::orderBy('id', 'DESC')->paginate(10);

        // Carregar a view 
        return view('course_batches.index', ['coursesBatches' => $coursesBatches]);
    }

    // Visualizar os detalhes da turma
    public function show(CourseBatch $courseBatch)
    {
        // Carregar a view 
        return view('course_batches.show', ['courseBatch' => $courseBatch]);
    }

    // Carregar o formulário cadastrar nova turma
    public function create()
    {
        // Carregar a view 
        return view('course_batches.create');
    }

    // Cadastrar no banco de dados o nova turma
    public function store(CourseBatchRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela turmas
            CourseBatch::create([
                'name' => $request->name
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.index')->with('success', 'Turma cadastrada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Turma não cadastrada!');
        }
    }

    // Carregar o formulário editar turma
    public function edit(CourseBatch $courseBatch)
    {
        // Carregar a view 
        return view('course_batches.edit', ['courseBatch' => $courseBatch]);
    }

    // Editar no banco de dados o turma
    public function update(CourseBatchRequest $request, CourseBatch $courseBatch)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $courseBatch->update([
                'name' => $request->name
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.show', ['courseBatch' => $courseBatch->id])->with('success', 'Turma editada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Turma não editada!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(CourseBatch $courseBatch)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $courseBatch->delete();
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.index')->with('success', 'Turma apagada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Turma não apagado!');
        }
    }
}
