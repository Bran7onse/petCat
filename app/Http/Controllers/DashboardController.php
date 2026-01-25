<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Recordatorio;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Obtener las citas de hoy
        $citasHoy = Cita::where('user_id', Auth::id())
            ->whereDate('fecha', Carbon::today())
            ->orderBy('hora')
            ->get();

        // 2. Calcular los recordatorios (ANTES del return)
        $recordatoriosPendientes = Recordatorio::where('enviado', false)
            ->whereHas('cita', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->count();

        // 3. Un solo return con todo lo que la vista necesita
        return view('dashboard', compact('citasHoy', 'recordatoriosPendientes'));
    }
}
