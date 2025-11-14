@extends('layouts.admin')

@section('content')
   <!-- Título e Trilha de Navegação -->
    <div class="content-wrapper">
        <div class="content-header">
            <h2 class="content-title">Transação</h2>
            <nav class="breadcrumb">
                <a href="{{ route('dashboard.index') }}" class="breadcrumb-link">Dashboard</a>
                <span>/</span>
                <a href="{{ route('transactions.index') }}" class="breadcrumb-link">Transações</a>
                <span>/</span>
                <span>Transação</span>
            </nav>
        </div>
    </div>

    <div class="content-box">
        <div class="content-box-header">
            <h3 class="content-box-title">Editar</h3>
            <div class="content-box-btn">
                @can('index-transactions')
                    <a href="{{ route('conta.index') }}" class="btn-info align-icon-btn">
                        <!-- Ícone queue-list (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                        <span>Listar</span>
                    </a>
                @endcan
            </div>
        </div>

        <x-alert />
        <form action="{{ route('transactions.update', $transaction->id) }}" method="GET">
            @csrf
            @method('GET')

             <div class="mb-4">
                <input type="text" name="categoria" id="categoria" class="form-input"
                    placeholder="Nome do Cliente" value="{{old('categoria', $transaction->categoria)}}" required>
            </div>

            <div class="mb-4">
               <input type="text" name="descricao" id="descricao" class="form-input"
                    placeholder="Descrição" value="{{ old('descricao', $transaction->descricao) }}" required>
            </div>

            <div class="mb-4">
                    <label for="tipo_transaction_id" class="form-label">Tipo</label>
                     <select  class="form-select select2" name="tipo" required>
                     <option value="entrada" {{ old('tipo', $transaction->tipo) == 'entrada' ? 'selected' : '' }}>Entrada</option>
            <option value="saida" {{ old('tipo', $transaction->tipo) == 'saida' ? 'selected' : '' }}>Saída</option>
                      </select>
                </div>


            <div class="mb-4">
                 <label  class="form-label">Valor:</label>
                <input type="text" name="valor" id="valor" class="form-input"
                    placeholder="Valor da Transação" value="{{ old('valor', $transaction->valor)  }} " required>
            </div>

            <div class="mb-4">
                <label for="data_transacao" class="form-label">Data da Transação</label>
                
            <input class="form-input" type="datetime-local" name="data_transacao" id="data_transacao"
               value="{{ old('data_transacao', \Carbon\Carbon::parse($transaction->data_transacao)->format('Y-m-d\TH:i')) }}" required>
           
            </div>


            <div class="mb-4">
                <input type="text" name="metodo_pagamento" id="metodo_pagamento" class="form-input"
                    placeholder="Metodo de pagamento" value="{{ old('metodo_pagamento', $transaction->metodo_pagamento) }}" >
            </div>

             <div class="mb-4">
                <input type="text" name="referencia" id="referencia" class="form-input"
                    placeholder="Referencia da transação" value="{{ old('referencia', $transaction->referencia) }}">
            </div>

            <div class="mb-4">

               <textarea placeholder="Observação" type="text" name="observacao" id="observacao" class="form-input" name="observacao">{{  old('observacao', $transaction->observacao)  }}</textarea>
            </div>



            <button type="submit" class="btn-success align-icon-btn">
                <!-- Ícone plus-circle (Heroicons) -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Atualizar</span>
            </button>

        </form>

    </div>
@endsection
