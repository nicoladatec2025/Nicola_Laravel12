<?php

namespace App\Http\Controllers;

use App\Models\Preco;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\PrecoRequest;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PrecoController extends Controller
{
    public function index(Request $request, Preco $precos)
    {
        $precos = Preco::all();

         $precos = Preco::when(
            $request->filled('item'),
            fn($query) =>
            $query->whereLike('item', '%' . $request->item .  '%')
        )
            ->orderBy('item', 'ASC')
            ->paginate(0)
            ->withQueryString();


        return view('precos.index', compact('precos'));
    }

    public function create()
    {
        return view('precos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'descricao' => 'required|string',
        ]);

           $preco = Preco::create($request->all());
      
         Log::info('Preco criado com sucesso', ['id' => $preco->id, 'preco' => $preco, 'action_user_id' => Auth::id()]);
            
        return redirect()->route('precos.index')
                         ->with('success', 'Preço cadastrado com sucesso!');
    }

    public function edit(Preco $preco)
    {
        return view('precos.edit', compact('preco'));
    }

    public function update(Request $request, Preco $preco)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'descricao' => 'required|string',
        ]);

        $preco->update($request->only(['item', 'valor', 'descricao']));

        Log::info('Preço atualizado com sucesso', ['id' => $preco->id, 'preco' => $preco, 'action_user_id' => Auth::id()]);
        
        return redirect()->route('precos.index')
                         ->with('success', 'Preço atualizado com sucesso!');
    }

    public function destroy(Preco $preco)
    {
        try {
            $preco->delete();

              Log::info('Preço excluído com sucesso!', ['id' => $preco->id, 'preco' => $preco, 'action_user_id' => Auth::id()]);
          
            return redirect()->route('precos.index')
                             ->with('success', 'Preço excluído com sucesso!');
        } catch (Exception $e) {

          
             Log::warning('Erro ao excluir o preço', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);

            return redirect()->route('precos.index')
                             ->with('error', 'Erro ao excluir o preço: ' . $e->getMessage());
        }
    }

    public function pdfpreco()
{
    try {
        $precos = Preco::all();

        $pdfpreco = Pdf::loadView('precos.pdfpreco', compact('precos'));
        return $pdfpreco->download('lista_precos.pdf');
    } catch (\Exception $e) {

         Log::warning('Erro ao gerar PDF', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);
        return redirect()->route('precos.index')
                         ->with('error', 'Erro ao gerar PDF: ' . $e->getMessage());
    }
}
}
