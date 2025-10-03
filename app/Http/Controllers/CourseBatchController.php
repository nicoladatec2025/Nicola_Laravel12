<?php

namespace App\Http\Controllers;

use App\Models\CourseBatch;
use Illuminate\Http\Request;

class CourseBatchController extends Controller
{
    // Listar as turmas dos cursos
    public function index()
    {
        // Carregar a view
        return view('courses_batches.index');
    }

    // Carregar o formulário cadastrar nova turma
    public function create()
    {
        // Carregar a view
        return view('courses_batches.create');
    }

    // Cadastrar no banco de dados o nova turma
    public function store(Request $request)
    {
        // dd($request);
        // Cadastrar no banco de dados na tabela turmas
        CourseBatch::create([
            'name' => $request->name
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('courses-batches.index')->with('success', 'Turma cadastrada com sucesso!');
    }
}
