@extends('layouts.admin')

@section('content')
  <!-- Título e Trilha de Navegação -->
    <div class="content-wrapper">
        <div class="content-header">
            <h2 class="content-title">Fluxo de Caixa Anual</h2>
            <nav class="breadcrumb">
                <a href="{{ route('dashboard.index') }}" class="breadcrumb-link">Dashboard</a>
                <span>/</span>
                <span>Fluxo-Anual</span>
            </nav>
        </div>
    </div>

    <div class="content-box">

        <x-alert />

      

        <div class="table-container mt-6">
            <table class="table">
                <thead>
                    <tr class="table-row-header">
                        <th class="table-header">Entradas</th>
                        <th class="table-header">Saídas</th>
                        <th class="table-header">Saldo</th>
                    </tr>
                </thead>

                <tbody>
                  
                        <tr class="table-row-body">
                            <td class="table-body"> {{ number_format($entrada ?? 0, 2, ',', '.')}} Kz </td>
                            <td class="table-body"> {{ number_format($saida ?? 0, 2, ',', '.') }} Kz </td>
                            <td class="table-body"> {{ number_format($saldo ?? 0, 2, ',', '.') }} Kz </td>
                
                        </tr>
                </tbody>
            </table>
    </div>  <br>

      <!-- Início Formulário de filtro -->
    
        <form class="form-search" method="GET" action="{{ route('cashflow.yearly') }}">
   
   <div> <label for="year">Ano:</label>
    <select name="year" id="year">
        @for($y=(int)date('Y')-3; $y<=(int)date('Y'); $y++)
            <option value="{{ $y }}" {{ (int)$y === (int)($year ?? date('Y')) ? 'selected' : '' }}>{{ $y }}</option>
        @endfor
    </select></div>

                <div class="flex gap-1">
                <button type="submit" class="btn-primary flex items-center space-x-1">
                    <!-- Ícone magnifying-glass (Heroicons) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <span>Filtrar</span>
                </button>


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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <span>PDF</span>
                    </a>
                @endcan
   </div>
        </form>
        <!-- Fim Formulário de filtro -->


   <div class="table-container mt-6">
            <table class="table">
                <thead>
                    <tr class="table-row-header">
                        <th class="table-header">O Remetente</th>
                        <th class="table-header">Tipo</th>
                        <th class="table-header">Valor</th>
                         <th class="table-header">Descrição</th>
                          <th class="table-header">Data</th>
                    </tr>
                </thead>

                <tbody>
                 
                    @forelse ($transactions as $t)
                        <tr class="table-row-body">
                             <td class="table-body">{{ $t->categoria}}</td>

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
                           </td>
                            <td class="table-body">{{ number_format((float)$t->valor, 2, ',', '.')}} Kz</td>
                            <td class="table-body">{{ $t->descricao  }}</td>
                            <td class="table-body">{{ $t->data_transacao->format('d/m/Y H:i')}}</td>
 
                           
                           
                        </tr>
                   
        @empty
        <tr><td colspan="5">Nenhuma transação encontrada para o ano selecionado</td></tr>
        @endforelse
    </tbody>
</table> <br>


@endsection