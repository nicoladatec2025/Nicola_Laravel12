@extends('layouts.admin')

@section('content')
    <!-- Título e Trilha de Navegação -->
    <div class="content-wrapper">
        <div class="content-header">
            <h2 class="content-title">Transação</h2>
            <nav class="breadcrumb">
                <a href="{{ route('dashboard.index') }}" class="breadcrumb-link">Dashboard</a>
                <span>/</span>
                <span>Transações</span>
            </nav>
        </div>
    </div>

    <div class="content-box">

        <div class="content-box-header">
            <h3 class="content-box-title">Listar</h3>

            <div class="content-box-btn">

            @can('create-transactions')
                    <a href="{{ route('transactions.create') }}" class="btn-success align-icon-btn">
                        <!-- Ícone plus-circle (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Nova Transação</span>
                    </a>
                @endcan

                @can('index-transactions')
                    <a href="{{ url('transactions.index') . (request()->getQueryString() ? '?' . request()->getQueryString() : '') }}"
                        class="btn-warning align-icon-btn">
                        <!-- Ícone document (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <span>PDF</span>
                    </a>
                @endcan

                
                 @can('cashflow/daily')
                    <a href="{{ route('cashflow.daily') }}"
                        class="btn-warning align-icon-btn">
                        <!-- Ícone document (Heroicons) -->
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                        <span>Diário</span>
                    </a>
                @endcan  

                @can('cashflow/monthly')
                    <a href="{{ route('cashflow.monthly') }}"
                        class="btn-warning align-icon-btn">
                        <!-- Ícone document (Heroicons) -->
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                        <span>Mensal</span>
                    </a>
                @endcan

                @can('cashflow/yearly')
                    <a href="{{ route('cashflow.yearly') }}"
                        class="btn-warning align-icon-btn">
                        <!-- Ícone document (Heroicons) -->
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                        <span>Anual</span>
                    </a>
                @endcan


            </div>
        </div>

        <x-alert />


        <div class="table-container mt-6">
            <table class="table">
                <thead>
                    <tr class="table-row-header">
                        <th class="table-header">ID</th>
                        <th class="table-header">Clente</th>
                         <th class="table-header">Tipo</th>
                        <th class="table-header">Valor</th>
                         <th class="table-header">Descrição</th>
                        <th class="table-header">Data</th>
                        <th class="table-header center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Imprimir os registros --}}
                    @forelse($transactions as $t)
                        <tr class="table-row-body">
                            <td class="table-body">{{ $t->id }}</td>
                            <td class="table-body">{{ $t->categoria }}</td>


                          <td class="table-body">
                    @if( ucfirst($t->tipo)  === 'Entrada')
                        <span class="badge" style="color: green; font-weight: bold;">
                            {{  ucfirst($t->tipo) }}
                        </span>
                    @elseif( ucfirst($t->tipo)  === 'Saida')
                        <span class="badge" style="color: red; font-weight: bold;">
                            {{  ucfirst($t->tipo)  }}
                        </span>
                    @else
                        <span class="badge" style="color: gray;">
                            {{  ucfirst($t->tipo)  }}
                        </span>
                    @endif


                            <td class="table-body">{{ number_format((float)$t->valor, 2, ',', '.')}} Kz</td>
                            <td class="table-body">{{$t->descricao }}</td>
                           <td class="table-body">{{$t->data_transacao->format('d/m/Y H:i') }}</td>
                            <td class="table-actions">
                                <div class="table-actions-align">
                                    @can('show-transactions')
                                        <a href="{{ route('transactions.show', $t->id)}}"
                                            class="btn-primary align-icon-btn">
                                            <!-- Ícone eye (Heroicons) -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                          
                                        </a>
                                    @endcan

                                    @can('edit-transactions')
                                        <a href="{{ route('transactions.edit', $t->id) }}"
                                            class="btn-warning table-md-hidden">
                                            <!-- Ícone pencil-square (Heroicons) -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                          
                                        </a>
                                    @endcan

                                   
                                </div>
                            </td>
                        </tr>

                    @empty
                        <div class="alert-warning">
                            Nenhuma transação encontrada!
                        </div>
                    @endforelse
                </tbody> 
            </table>

            <div class="mt-2 p-3">
                {{ $transactions->onEachSide(1)->links() }}
            </div>
        </div>

    </div>
@endsection
