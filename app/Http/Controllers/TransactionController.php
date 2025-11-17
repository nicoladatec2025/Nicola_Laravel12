<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;


class TransactionController extends Controller
{


    public function index(Request $request)
{
    $transactions = Transaction::orderBy('id', 'desc')->paginate(15);

 $query = Transaction::query();

    // Filtro por data_transacao (data exata)
    if ($request->filled('data_transacao')) {
        $query->whereDate('data_transacao', $request->input('data_transacao'));
    }

    // Filtro por descrição (texto parcial)
    if ($request->filled('categoria')) {
        $query->where('categoria', 'like', '%' . $request->input('categoria') . '%');
    }

    $transactions = $query->orderBy('data_transacao', 'desc')->paginate(10);

    return view('transactions.index', compact('transactions'));
}


     public function show($id)
    {
        // Busca manual pelo ID
        $transaction = Transaction::findOrFail($id);

        return view('transactions.show', compact('transaction'));
    }



    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Salva uma nova transação no banco
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descricao'        => 'required|string|max:255',
            'tipo'             => 'required|in:entrada,saida',
            'valor'            => 'required|numeric|min:0',
            'data_transacao'   => 'required|date',
            'categoria'        => 'required|string|max:255',
            'metodo_pagamento' => 'required|string|max:255',
            'referencia'       => 'nullable|string|max:255',
            'observacao'       => 'nullable|string',
        ]);

          $transaction = Transaction::create($validated);

        Log::info('Transação criada com sucesso', ['id' => $transaction->id, 'transaction' => $transaction, 'action_user_id' => Auth::id()]);
           

        return redirect()->route('transactions.index')
                         ->with('success', 'Transação criada com sucesso!');
    }

    /**
     * Exibe o formulário de edição
     */
    public function edit($id)
{
    try {
        $transaction = Transaction::findOrFail($id);

         Log::info('Transação editada com sucesso', ['id' => $transaction->id, 'transaction' => $transaction, 'action_user_id' => Auth::id()]);
             
        return view('transactions.edit', compact('transaction'));
   
    } catch (\Exception $e) {

         
             Log::warning('Transação não editada', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);
        return redirect()->route('transactions.index')
                         ->with('error', 'Erro ao carregar a transação para edição.');
    }
}


    /**
     * Atualiza uma transação existente
     */
    public function update(Request $request, $id)
{
    try {
        $transaction = Transaction::findOrFail($id);

        // Validação de todos os campos
        $validated = $request->validate([
            'descricao'        => 'required|string|max:255',
            'tipo'             => 'required|in:entrada,saida',
            'valor'            => 'required|numeric|min:0',
            'data_transacao'   => 'required|date',
            'categoria'        => 'required|string|max:100',
            'metodo_pagamento' => 'required|string|max:100',
            'referencia'       => 'nullable|string|max:255',
            'observacao'       => 'nullable|string|max:500',
        ]);

        // Atualiza os dados
        $transaction->update($validated);
Log::info('Transação atualizada com sucesso', ['id' => $transaction->id, 'transaction' => $transaction, 'action_user_id' => Auth::id()]);
        return redirect()->route('transactions.index')
                         ->with('success', 'Transação atualizada com sucesso!');
    } catch (\Exception $e) {

        Log::warning('Erro ao atualizar a transação', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);
        return redirect()->route('transactions.index')
                         ->with('error', 'Erro ao atualizar a transação.');
    }
}



   public function destroy()
    {


        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('transactions.index')->with('success', 'Transaçºao apagada com sucesso');
    }

  

public function exportPdf($id)
{
    try {
        $transaction = Transaction::findOrFail($id);

        $pdf = Pdf::loadView('transactions.pdf', compact('transaction'));

        return $pdf->download('transacao_'.$transaction->id.'.pdf');
    } catch (\Exception $e) {
        return redirect()->route('transactions.index')
                         ->with('error', 'Erro ao gerar PDF da transação.');
    }
}


}
