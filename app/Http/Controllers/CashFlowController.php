<?php


namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Log;



class CashFlowController extends Controller
{

    
    public function daily(Request $request)
{
    // Se o usuário não informar, usa a data de hoje
    $date = $request->input('date', now()->toDateString());

    // Consulta filtrada
    $transactions = Transaction::query()
        ->whereDate('data_transacao', $date)
        ->orderBy('data_transacao')
        ->get();

    $entrada = $transactions->where('tipo', 'entrada')->sum('valor');
    $saida   = $transactions->where('tipo', 'saida')->sum('valor');
    $saldo   = $entrada - $saida;

     // Se não informado, usa a data de hoje
    $date = $request->input('date', now()->toDateString());

    $transactions = Transaction::query()
        ->whereDate('data_transacao', $date)
        ->orderBy('data_transacao')
        ->get();

    $entrada = $transactions->where('tipo', 'entrada')->sum('valor');
    $saida   = $transactions->where('tipo', 'saida')->sum('valor');
    $saldo   = $entrada - $saida;

    // Gráfico - Agrupar por hora
    $labels = [];
    $entradasHora = [];
    $saidasHora = [];

    for ($h = 0; $h < 24; $h++) {
        $labels[] = sprintf('%02d:00', $h);
        $entradasHora[$h] = 0.0;
        $saidasHora[$h] = 0.0;
    }

    foreach ($transactions as $t) {
        $h = (int)$t->data_transacao->format('H');
        if ($t->tipo === 'entrada') {
            $entradasHora[$h] += (float)$t->valor;
        } else {
            $saidasHora[$h] += (float)$t->valor;
        }
    }

    $chartDaily = [
        'labels'   => $labels,
        'entradas' => array_values($entradasHora),
        'saidas'   => array_values($saidasHora),
    ];

 
     return view('cashflow.daily', compact('transactions', 'entrada', 'saida', 'saldo', 'date', 'chartDaily'));
}

    public function monthly(Request $request)
    {
        $month = (int)($request->input('month', Carbon::now()->month));
        $year  = (int)($request->input('year', Carbon::now()->year));

        $transactions = Transaction::whereYear('data_transacao', $year)
            ->whereMonth('data_transacao', $month)
            ->orderBy('data_transacao')
            ->get();

        $entrada = $transactions->where('tipo', 'entrada')->sum('valor');
        $saida   = $transactions->where('tipo', 'saida')->sum('valor');
        $saldo   = $entrada - $saida;


  // Agrupar por dia
    $labels = [];
    $entradasDia = [];
    $saidasDia = [];
    $saldoAcumulado = [];
    $acumulado = 0;

    foreach ($transactions->groupBy(fn($t) => $t->data_transacao->format('d')) as $dia => $group) {
        $labels[] = str_pad($dia, 2, '0', STR_PAD_LEFT).'/'.str_pad($month, 2, '0', STR_PAD_LEFT);
        $entradas = $group->where('tipo','entrada')->sum('valor');
        $saidas   = $group->where('tipo','saida')->sum('valor');
        $entradasDia[] = $entradas;
        $saidasDia[]   = $saidas;
        $acumulado += ($entradas - $saidas);
        $saldoAcumulado[] = $acumulado;
    }

    $chartMonthly = [
        'labels'         => $labels,
        'entradas'       => $entradasDia,
        'saidas'         => $saidasDia,
        'saldoAcumulado' => $saldoAcumulado,
    ];

    return view('cashflow.monthly', compact(
        'transactions','entrada','saida','saldo','month','year','chartMonthly'
    ));
    }

    public function yearly(Request $request)
    {
        $year = (int)($request->input('year', Carbon::now()->year));

        $transactions = Transaction::whereYear('data_transacao', $year)
            ->orderBy('data_transacao')
            ->get();

        $entrada = $transactions->where('tipo', 'entrada')->sum('valor');
        $saida   = $transactions->where('tipo', 'saida')->sum('valor');
        $saldo   = $entrada - $saida;

        // Agrupar por mês
    $labels = [];
    $entradasMes = [];
    $saidasMes = [];
    $saldoAcumulado = [];
    $acumulado = 0;

    for ($m = 1; $m <= 12; $m++) {
        $labels[] = \Carbon\Carbon::createFromDate($year, $m, 1)->format('M');
        $entradas = $transactions->where('tipo','entrada')
                                 ->filter(fn($t) => $t->data_transacao->format('n') == $m)
                                 ->sum('valor');
        $saidas   = $transactions->where('tipo','saida')
                                 ->filter(fn($t) => $t->data_transacao->format('n') == $m)
                                 ->sum('valor');
        $entradasMes[] = $entradas;
        $saidasMes[]   = $saidas;
        $acumulado += ($entradas - $saidas);
        $saldoAcumulado[] = $acumulado;
    }

    $chartYearly = [
        'labels'         => $labels,
        'entradas'       => $entradasMes,
        'saidas'         => $saidasMes,
        'saldoAcumulado' => $saldoAcumulado,
    ];

    return view('cashflow.yearly', compact(
        'transactions','entrada','saida','saldo','year','chartYearly'
    ));
    
    }

 
public function exportMonthlyPdf()
{
    try {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth   = Carbon::now()->endOfMonth();

        $transactions = Transaction::whereBetween('data_transacao', [$startOfMonth, $endOfMonth])->get();

        $entradas = $transactions->where('tipo', 'entrada')->sum('valor');
        $saidas   = $transactions->where('tipo', 'saida')->sum('valor');
        $saldo    = $entradas - $saidas;

        $pdf = Pdf::loadView('cashflow.pdfmensal', compact('transactions', 'entradas', 'saidas', 'saldo', 'startOfMonth', 'endOfMonth'));

        return $pdf->download('cashflow_mensal.pdf');
    } catch (\Exception $e) {
        return redirect()->route('transactions.index')
                         ->with('error', 'Erro ao gerar PDF do fluxo de caixa.');
    }
}

public function exportAnnualPdf()
{
    try {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear   = Carbon::now()->endOfYear();

        // Busca todas as transações do ano
        $transactions = Transaction::whereBetween('data_transacao', [$startOfYear, $endOfYear])->get();

        // Calcula totais
        $entradas = $transactions->where('tipo', 'entrada')->sum('valor');
        $saidas   = $transactions->where('tipo', 'saida')->sum('valor');
        $saldo    = $entradas - $saidas;

        // Gera PDF
        $pdf = Pdf::loadView('cashflow.pdfannual', compact('transactions', 'entradas', 'saidas', 'saldo', 'startOfYear', 'endOfYear'));

        return $pdf->download('cashflow_anual.pdf');
    } catch (\Exception $e) {
        return redirect()->route('transactions.index')
                         ->with('error', 'Erro ao gerar PDF anual do fluxo de caixa.');
    }
}


}









