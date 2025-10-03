<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // Listar os cursos
    public function index()
    {
        // Carregar a view
        return view('courses.index');
    }

    // Carregar o formulário cadastrar novo curso
    public function create()
    {
        // Carregar a view
        return view('courses.create');
    }

    // Cadastrar no banco de dados o novo curso
    public function store(Request $request)
    {
        // dd($request);
        // Cadastrar no banco de dados na tabela cursos
        Course::create([
            'name' => $request->name
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('courses.index')->with('success', 'Curso cadastrado com sucesso!');
    }
}
