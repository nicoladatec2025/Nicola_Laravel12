<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Exception;

class CourseController extends Controller
{
    // Listar os cursos
    public function index()
    {
        // Recuperar os registros do banco dados
        $courses = Course::orderBy('id', 'DESC')->paginate(10);

        // Carregar a view 
        return view('courses.index', ['courses' => $courses]);
    }

    // Visualizar os detalhes do curso
    public function show(Course $course)
    {
        // dd($course);
        // Carregar a view 
        return view('courses.show', ['course' => $course]);
    }

    // Carregar o formulário cadastrar novo curso
    public function create()
    {
        // Carregar a view 
        return view('courses.create');
    }

    // Cadastrar no banco de dados o novo curso
    public function store(CourseRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela cursos
            $course = Course::create([
                'name' => $request->name
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('courses.show', ['course' => $course->id])->with('success', 'Curso cadastrado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Curso não cadastrado!');
        }
    }

    // Carregar o formulário editar curso
    public function edit(Course $course)
    {
        // Carregar a view 
        return view('courses.edit', ['course' => $course]);
    }

    // Editar no banco de dados o curso
    public function update(CourseRequest $request, Course $course)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $course->update([
                'name' => $request->name
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('courses.show', ['course' => $course->id])->with('success', 'Curso editado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Curso não editado!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(Course $course)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $course->delete();
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('courses.index')->with('success', 'Curso apagado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Curso não apagado!');
        }
    }
}
