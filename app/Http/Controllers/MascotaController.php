<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    // Solo dejamos el index por si acaso lo usas en otra ruta, 
    // pero si usas Livewire Index, esto también podría borrarse.
    public function index()
    {
        $mascotas = Mascota::where('propietario_id', Auth::id())->get();
        return view('mascotas.index', compact('mascotas'));
    }
}
