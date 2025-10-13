<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    // Página inicial do administrativo
    public function index()
    {

        // Salvar log
        Log::notice('Dashboard.', ['action_user_id' => Auth::id()]);

        // Carregar a VIEW
        return view('dashboard.index');
    }
}
