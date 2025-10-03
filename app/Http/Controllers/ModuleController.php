<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Listar os módulos das turmas
    public function index()
    {
        // Carregar a view
        return view('modules.index');
    }

    // Carregar o formulário cadastrar novo módulo
    public function create()
    {
        // Carregar a view
        return view('modules.create');
    }

    // Cadastrar no banco de dados o novo módulo
    public function store(Request $request)
    {
        // dd($request);
        // Cadastrar no banco de dados na tabela módulo
        Module::create([
            'name' => $request->name
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('modules.index')->with('success', 'Módulo cadastrado com sucesso!');
    }
}
