<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use Exception;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Listar os módulos das turmas
    public function index()
    {
        // Recuperar os registros do banco dados
        $modules = Module::orderBy('id', 'DESC')->paginate(10);

        // Carregar a view 
        return view('modules.index', ['modules' => $modules]);
    }

    // Visualizar os detalhes do módulo
    public function show(Module $module)
    {
        // Carregar a view 
        return view('modules.show', ['module' => $module]);
    }

    // Carregar o formulário cadastrar novo módulo
    public function create()
    {
        // Carregar a view 
        return view('modules.create');
    }

    // Cadastrar no banco de dados o novo módulo
    public function store(ModuleRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela módulo
            Module::create([
                'name' => $request->name
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('modules.index')->with('success', 'Módulo cadastrado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Módulo não cadastrado!');
        }        
    }

    // Carregar o formulário editar módulo
    public function edit(Module $module)
    {
        // Carregar a view 
        return view('modules.edit', ['module' => $module]);
    }

    // Editar no banco de dados o módulo
    public function update(ModuleRequest $request, Module $module)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $module->update([
                'name' => $request->name
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('modules.show', ['module' => $module->id])->with('success', 'Módulo editado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Módulo não editado!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(Module $module)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $module->delete();
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('modules.index')->with('success', 'Módulo apagado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Módulo não apagado!');
        }
    }
}
