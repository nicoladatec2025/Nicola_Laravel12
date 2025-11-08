<?php


namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    return view('cashflow.daily', compact('transactions', 'entrada', 'saida', 'saldo', 'date'));
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

        // Monta labels e datasets sem usar closures no Blade
        $labels = [];
        $entradasDia = [];
        $saidasDia = [];

        // Agrupa por dia
        $byDay = [];
        foreach ($transactions as $t) {
            $key = $t->data_transacao->format('d/m');
            if (!isset($byDay[$key])) {
                $byDay[$key] = ['entrada' => 0.0, 'saida' => 0.0];
            }
            if ($t->tipo === 'entrada') {
                $byDay[$key]['entrada'] += (float)$t->valor;
            } else {
                $byDay[$key]['saida'] += (float)$t->valor;
            }
        }

        foreach ($byDay as $day => $totais) {
            $labels[] = $day;
            $entradasDia[] = $totais['entrada'];
            $saidasDia[] = $totais['saida'];
        }

        $chartMonthly = [
            'labels'   => $labels,
            'entradas' => $entradasDia,
            'saidas'   => $saidasDia,
        ];

        return view('cashflow.monthly', compact('transactions', 'entrada', 'saida', 'saldo', 'month', 'year', 'chartMonthly'));
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

        // Monta dados por mês para gráfico anual (barras)
        $labels = [];
        $entradasMes = [];
        $saidasMes = [];

        // Inicializa meses 1..12
        for ($m = 1; $m <= 12; $m++) {
            $labels[] = Carbon::createFromDate($year, $m, 1)->locale('pt_BR')->isoFormat('MMM');
            $entradasMes[$m] = 0.0;
            $saidasMes[$m] = 0.0;
        }

        foreach ($transactions as $t) {
            $m = (int)$t->data_transacao->format('n');
            if ($t->tipo === 'entrada') {
                $entradasMes[$m] += (float)$t->valor;
            } else {
                $saidasMes[$m] += (float)$t->valor;
            }
        }

        // Normaliza para arrays indexados
        $chartYearly = [
            'labels'   => $labels,
            'entradas' => array_values($entradasMes),
            'saidas'   => array_values($saidasMes),
            'resumo'   => [(float)$entrada, (float)$saida], // para gráfico de pizza opcional
        ];

        return view('cashflow.yearly', compact('transactions', 'entrada', 'saida', 'saldo', 'year', 'chartYearly'));
    }
}









