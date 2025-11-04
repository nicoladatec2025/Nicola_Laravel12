<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseBatchRequest;
use App\Models\Course;
use App\Models\CourseBatch;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CourseBatchController extends Controller
{
    // Listar as turmas dos cursos
    public function index(Course $course)
    {
        // Recuperar os registros do banco dados
        $coursesBatches = CourseBatch::orderBy('id', 'DESC')
            ->where('course_id', $course->id)
            ->paginate(10);

        // Salvar log
        Log::info('Listar as Classes.', ['action_user_id' => Auth::id()]);

        // Carregar a view
        return view('course_batches.index', ['menu' => 'courses', 'coursesBatches' => $coursesBatches, 'course' => $course]);
    }

    // Visualizar os detalhes da turma
    public function show(CourseBatch $courseBatch)
    {
        // Salvar log
        Log::info('Visualizar a classe.', ['course_batch_id' => $courseBatch->id, ['action_user_id' => Auth::id()]]);

        // Carregar a view
        return view('course_batches.show', ['menu' => 'courses', 'courseBatch' => $courseBatch]);
    }

    // Carregar o formulário cadastrar nova turma
    public function create(Course $course)
    {

                        // Carregar a view
        return view('course_batches.create', ['menu' => 'courses', 'course' => $course]);
    }

    // Cadastrar no banco de dados o nova classe
    public function store(Course $course, CourseBatchRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela classe
            $courseBatch = CourseBatch::create([
                'name' => $request->name,
                'course_id' => $course->id,
            ]);

            // Salvar log
            Log::info('Curso cadastrada.', ['course_batch_id' => $courseBatch->id, ['action_user_id' => Auth::id()]]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.show', ['courseBatch' => $courseBatch->id])->with('success', 'Curso cadastrada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Curso não cadastrada.', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Classe não cadastrada!');
        }
    }

    // Carregar o formulário editar turma
    public function edit(CourseBatch $courseBatch)
    {
         // Recuperar do banco de dados as situações
        $course = Course::orderBy('name', 'asc')->get();

        // Carregar a view
        return view('course_batches.edit', ['menu' => 'courses', 'courseBatch' => $courseBatch,
        'courses' => $course,
    ]);

    }

    // Editar no banco de dados o turma
    public function update(CourseBatch $courseBatch, CourseBatchRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $courseBatch->update([
                'name' => $request->name
            ]);

            // Salvar log
            Log::info('Curso editada.', ['course_batch_id' => $courseBatch->id, ['action_user_id' => Auth::id()]]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.show', ['courseBatch' => $courseBatch->id])->with('success', 'Curso editada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Curso não editada.', ['error' => $e->getMessage(), ['action_user_id' => Auth::id()]]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Curso não editada!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(CourseBatch $courseBatch)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $courseBatch->delete();

            // Salvar log
            Log::info('Curso apagada.', ['course_batch_id' => $courseBatch->id, ['action_user_id' => Auth::id()]]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.index', ['course' => $courseBatch->course_id])->with('success', 'Curso apagada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Curso não apagada.', ['error' => $e->getMessage(), ['action_user_id' => Auth::id()]]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Curso não apagado!');
        }
    }
}
