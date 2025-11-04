<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Module;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    // Listar as aulas
    public function index(Module $module)
    {
        // dd($module);
        // Recuperar os registros do banco dados
        $lessons = Lesson::orderBy('id', 'DESC')
            ->where('module_id', $module->id)
            ->paginate(10);

        // Salvar log
        Log::info('Listar os níveis.', ['action_user_id' => Auth::id()]);

        // Carregar a view
        return view('lessons.index', ['menu' => 'courses', 'lessons' => $lessons, 'module' => $module]);
    }

    // Visualizar os detalhes da aula
    public function show(Lesson $lesson)
    {
        // Salvar log
        Log::info('Visualizar o nívei.', ['lesson_id' => $lesson->id, 'action_user_id' => Auth::id()]);

        // Carregar a view
        return view('lessons.show', ['menu' => 'courses', 'lesson' => $lesson]);
    }

    // Carregar o formulário cadastrar nova aula
    public function create(Module $module)
    {
        // Carregar a view
        return view('lessons.create', ['menu' => 'courses', 'module' => $module]);
    }

    // Cadastrar no banco de dados o nova aula
    public function store(LessonRequest $request, Module $module)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela aula
            $lesson = Lesson::create([
                'name' => $request->name,
                'module_id' => $module->id,
            ]);

            // Salvar log
            Log::info('Nível cadastrada.', ['lesson_id' => $lesson->id, 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.show', ['lesson' => $lesson->id])->with('success', 'Nível cadastrada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Nível não cadastrada.', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Nível não cadastrada!');
        }
    }

    // Carregar o formulário editar aula
    public function edit(Lesson $lesson)
    {
        // Carregar a view
        return view('lessons.edit', ['menu' => 'courses', 'lesson' => $lesson]);
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

            // Salvar log
            Log::info('Nível editada.', ['lesson_id' => $lesson->id, 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.show', ['lesson' => $lesson->id])->with('success', 'Nível editada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Nível não editada.', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);

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

            // Salvar log
            Log::info('Nível apagado.', ['lesson_id' => $lesson->id, 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.index', ['module' => $lesson->module_id])->with('success', 'Nível apagada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Nível não apagado.', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Nível não apagado!');
        }
    }

      // Gerar PDF
    public function generatePdfLesson(Lesson $lesson)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Carregar a string com o HTML/conteúdo e determinar a orientação e o tamanho do arquivo
            $pdf = Pdf::loadView('lessons.generate_pdf_lesson', ['lesson' => $lesson])->setPaper('a4', 'portrait');


            // Fazer o download do arquivo
            return $pdf->download('view_lesson_' . $lesson->id . '.pdf');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('PDF dos dados do Nível não gerado.', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'PDF dos dados do Nível não gerado!');
        }
    }

     // Gerar PDF
    public function cartaoPdfLesson(Lesson $lesson)
    {
        // Capturar possíveis exceções durante a execução.
        try {


            // Carregar a string com o HTML/conteúdo e determinar a orientação e o tamanho do arquivo
            $pdf = Pdf::loadView('lessons.cartao_pdf_lesson', ['lesson' => $lesson])->setPaper('a4', 'portrait');



            // Fazer o download do arquivo
            return $pdf->download('view_lesson_' . $lesson->id . '.pdf');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Cartao não gerado.', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Cartao não gerado!');
        }
    }

}
