@extends('layouts.admin')

@section('content')


 <!-- Título e Trilha de Navegação -->
    <div class="content-wrapper">
        <div class="content-header">
            <h2 class="content-title">Transação</h2>
            <nav class="breadcrumb">
                <a href="{{ route('dashboard.index') }}" class="breadcrumb-link">Dashboard</a>
                <span>/</span>
                <a href="{{ route('users.index') }}" class="breadcrumb-link">Transações</a>
                <span>/</span>
                <span>Transação</span>
            </nav>
        </div>
    </div>

    <div class="content-box">
        <div class="content-box-header">
            <h3 class="content-box-title">Detalhes da Transação</h3>
            <div class="content-box-btn">

                @can('index-transactions')
                    <a href="{{ route('transactions.index') }}" class="btn-info align-icon-btn">
                        <!-- Ícone queue-list (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                        <span>Listar</span>
                    </a>
                @endcan

                @can('edit-transactions')
                    <a href="{{ route('transactions.edit', ['transactions' => $transaction->id]) }}" class="btn-warning align-icon-btn">
                        <!-- Ícone pencil-square (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        <span>Editar</span>
                    </a>
                @endcan

            </div>
        </div>

        <x-alert />
        <div class="detail-box">

            <div class="mb-1">
                <span class="title-detail-content">ID:</span>
                <span class="detail-content">{{ $transaction->id }}</span>
            </div>

            <div class="mb-1">
                <span class="title-detail-content">Cliente:</span>
                <span class="detail-content">{{ $transaction->categoria }} </span>
                 </div>

            <div class="mb-1">
                <span class="title-detail-content">Descrição:</span>
                <span class="detail-content">{{ $transaction->descricao }}</span>
           </div>

               <div class="mb-1">
                <span class="title-detail-content">Tipo:</span>
                <span class="detail-content">{{ ucfirst($transaction->tipo) }} </span>
                 </div>

                 <div class="mb-1">
                <span class="title-detail-content">Valor:</span>
                <span class="detail-content">{{ number_format($transaction->valor, 2, ',', '.') }} Kz</span>
                 </div>

                  <div class="mb-1">
                <span class="title-detail-content">Método de Pagamento:</span>
                <span class="detail-content">{{ $transaction->metodo_pagamento }} </span>
                 </div>

                  <div class="mb-1">
                <span class="title-detail-content">Referência:</span>
                <span class="detail-content">{{ $transaction->referencia }} </span>
                 </div>

                  <div class="mb-1">
                <span class="title-detail-content">Observação:</span>
                <span class="detail-content">{{ $transaction->observacao }} </span>
                 </div>

                  <div class="mb-1">
                <span class="title-detail-content">Data:</span>
                <span class="detail-content">{{ \Carbon\Carbon::parse($transaction->data_transacao)->format('d/m/Y') }}</span>
                 </div>


       </div>

@endsection
