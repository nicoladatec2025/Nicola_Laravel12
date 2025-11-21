<?php

// app/Http/Controllers/CursoController.php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $query = Curso::query()->ativos();

        if ($categoria = $request->get('categoria')) {
            $query->where('categoria', $categoria);
        }
        if ($nivel = $request->get('nivel')) {
            $query->where('nivel', $nivel);
        }
        if ($busca = $request->get('q')) {
            $query->where(function($q) use ($busca) {
                $q->where('titulo','like',"%{$busca}%")
                  ->orWhere('descricao','like',"%{$busca}%");
            });
        }

        $cursos = $query->orderBy('created_at','desc')->paginate(9)->withQueryString();



        return view('cursos.index', compact('cursos'));
    }

    public function show(Curso $curso)
    {
        abort_unless($curso->ativo, 404);
        return view('cursos.show', compact('curso'));
    }

    // ADMIN
    public function adminIndex(Request $request)
    {
        $cursos = Curso::query()
            ->when($request->boolean('somente_ativos'), fn($q) => $q->where('ativo', true))
            ->orderBy('created_at','desc')
            ->paginate(12)
            ->withQueryString();

            Log::info('Listar os cursos.', ['action_user_id' => Auth::id()]);
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(StoreCursoRequest $request)
    {
        $data = $request->validated();

     try {

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('cursos', 'public');
        }

        $curso = Curso::create($data);

        return redirect()->route('admin.cursos.create', $curso)->with('status','Curso criado com sucesso.');

    }  catch (Exception $e) {

            // Salvar log
            Log::warning('Conta não cadastrada', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Conta não cadastrada!');
        }
}
    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit', compact('curso'));
    }

    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        $data = $request->validated();

     try {

        if ($request->hasFile('imagem')) {
            if ($curso->imagem) {
                Storage::disk('public')->delete($curso->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('cursos', 'public');
        }

        $curso->update($data);


        return redirect()->route('admin.cursos.index', $curso)->with('status','Curso atualizado.');

        } catch (Exception $e) {

            // Salvar log
            Log::warning('Conta não editada', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Conta não editada!');
        }
    }

    public function destroy(Curso $curso)
    {
        if ($curso->imagem) {
            Storage::disk('public')->delete($curso->imagem);
        }
        $curso->delete();

        return redirect()->route('admin.cursos.index')->with('status','Curso removido.');
    }

    public function toggle(Curso $curso)
    {
        $curso->update(['ativo' => !$curso->ativo]);
        return back()->with('status', $curso->ativo ? 'Curso ativado.' : 'Curso desativado.');
    }
}

