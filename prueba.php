<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MascotaFoto;
use Livewire\WithFileUploads;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::where('propietario_id', Auth::id())->get();
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        // 1. Validar (Incluyendo las fotos)
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'fotos.*' => 'image|max:1024', // Validamos que cada archivo sea imagen y max 1MB
        ]);

        // 2. Crear la Mascota y guardarla en una variable
        $mascota = Mascota::create([
            'propietario_id' => $request->propietario_id ?? Auth::id(), // Si viene del select, lo usamos, si no, el usuario logueado
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'sexo' => $request->sexo,
            'peso' => $request->peso,
        ]);

        // 3. Procesar las fotos si existen
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                // Guardar en storage/app/public/mascotas
                $path = $foto->store('mascotas', 'public');

                // Crear registro en la tabla relacionada
                MascotaFoto::create([
                    'mascota_id' => $mascota->id,
                    'url' => $path
                ]);
            }
        }

        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota registrada correctamente con sus fotos 🐾');
    }
}
