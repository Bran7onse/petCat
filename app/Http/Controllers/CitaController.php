<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recordatorio;
use Carbon\Carbon;


class CitaController extends Controller
{
    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        //Validación
        $request->validate([
            'mascota' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'pendiente',
        ]);

        //Guardar la cita
        $cita = Cita::create([
            'user_id' => Auth::id(),
            'mascota' => $request->mascota,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'estado' => 'pendiente',
        ]);

        //PASO 6: CREAR RECORDATORIO AUTOMÁTICO 
        Recordatorio::create([
            'cita_id' => $cita->id,
            'telefono' => Auth::user()->phone ?? '593999999999',
            'mensaje' => "🐾 Recordatorio PetCare: Tu cita para {$cita->mascota} es el {$cita->fecha} a las {$cita->hora}",
            'fecha_envio' => Carbon::parse($cita->fecha . ' ' . $cita->hora)->subHour(),
            'enviado' => false,
        ]);

        //Redirigir
        return redirect()
            ->route('dashboard')
            ->with('success', 'Cita agendada correctamente');
    }

    public function index()
    {
        $citas = Cita::where('user_id', Auth::id())
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();

        return view('citas.index', compact('citas'));
    }

    public function confirmar(Cita $cita)
    {
        $cita->update(['estado' => 'confirmada']);
        return back()->with('success', 'Cita confirmada');
    }

    public function cancelar(Cita $cita)
    {
        $cita->update(['estado' => 'cancelada']);
        return back()->with('success', 'Cita cancelada');
    }
}
