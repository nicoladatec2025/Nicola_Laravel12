<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->paginate(15);
        return view('transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
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
            'categoria'        => 'nullable|string|max:255',
            'metodo_pagamento' => 'nullable|string|max:255',
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
            'categoria'        => 'nullable|string|max:255',
            'metodo_pagamento' => 'nullable|string|max:255',
            'referencia'       => 'nullable|string|max:255',
            'observacao'       => 'nullable|string',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')
                         ->with('success', 'Transação atualizada com sucesso!');
    }


    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
                         ->with('success', 'Transação excluída com sucesso!');
    }
}
