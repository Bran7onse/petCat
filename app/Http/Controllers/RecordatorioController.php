<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recordatorio;


class RecordatorioController extends Controller
{
    public function index()
    {
        $recordatorios = Recordatorio::whereHas('cita', function ($q) {
            $q->where('user_id', Auth::id());
        })->orderBy('fecha_envio')->get();

        return view('recordatorios.index', compact('recordatorios'));
    }
}
