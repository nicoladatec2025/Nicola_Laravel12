<?php

namespace App\Http\Controllers;

use App\Models\CourseStatus;
use Illuminate\Http\Request;

class CourseStatusController extends Controller
{
    // Listar os status cursos
    public function index()
    {
        // Carregar a view
        return view('courses_status.index');
    }

    // Carregar o formulário cadastrar novo status curso
    public function create()
    {
        // Carregar a view
        return view('courses_status.create');
    }

    // Cadastrar no banco de dados o novo status curso
    public function store(Request $request)
    {
        // dd($request);
        // Cadastrar no banco de dados na tabela status cursos
        CourseStatus::create([
            'name' => $request->name
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('courses-status.index')->with('success', 'Status cadastrado com sucesso!');
    }
}
