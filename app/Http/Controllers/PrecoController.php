<?php

namespace App\Http\Controllers;

use App\Models\Preco;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\PrecoRequest;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PrecoController extends Controller
{
    public function index()
    {
        $precos = Preco::all();
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

        Preco::create($request->all());

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

        return redirect()->route('precos.index')
                         ->with('success', 'Preço atualizado com sucesso!');
    }

    public function destroy(Preco $preco)
    {
        try {
            $preco->delete();
            return redirect()->route('precos.index')
                             ->with('success', 'Preço excluído com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('precos.index')
                             ->with('error', 'Erro ao excluir o preço: ' . $e->getMessage());
        }
    }

    public function exportPdf()
{
    try {
        $precos = Preco::all();

        $pdf = Pdf::loadView('precos.pdf', compact('precos'));
        return $pdf->download('lista_precos.pdf');
    } catch (\Exception $e) {
        return redirect()->route('precos.index')
                         ->with('error', 'Erro ao gerar PDF: ' . $e->getMessage());
    }
}
}
