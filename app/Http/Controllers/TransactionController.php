<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;


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

        Transaction::create($validated);

        return redirect()->route('transactions.index')
                         ->with('success', 'Transação criada com sucesso!');
    }

    /**
     * Exibe o formulário de edição
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Atualiza uma transação existente
     */
    public function update(Request $request, Transaction $transaction)
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

        $transaction->update($validated);

        return redirect()->route('transactions.index')
                         ->with('success', 'Transação atualizada com sucesso!');
    }


   public function destroy()
    {


        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('transactions.index')->with('success', 'Transaçºao apagada com sucesso');
    }


}
