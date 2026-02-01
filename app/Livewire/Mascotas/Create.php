<?php

namespace App\Livewire\Mascotas;

use App\Models\Mascota;
use App\Models\MascotaFoto;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use Toast, WithFileUploads;

    public array $breadcrumbs = [
        ['label' => 'Mascotas', 'link' => '/mascotas'],
        ['label' => 'Nueva Mascota'],
    ];

    // Propiedades
    public $nombre;
    public $especie;
    public $raza;
    public $peso;
    public $fecha_nacimiento;
    public $sexo;
    public $propietario_id;

    // Fotos
    public $fotos = [];

    public $especies = [
        ['id' => 'Perro', 'name' => 'Perro'],
        ['id' => 'Gato', 'name' => 'Gato'],
        ['id' => 'Ave', 'name' => 'Ave'],
    ];

    // Validación al seleccionar foto
    public function updatedFotos()
    {
        $this->validate([
            'fotos.*' => 'image|max:10240', // 10MB
        ]);
    }

    public function removeFoto($key)
    {
        array_splice($this->fotos, $key, 1);
    }

    public function store()
    {
        // 1. Validar
        $this->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required',
            'peso' => 'required|numeric',
            'propietario_id' => 'required|exists:users,id',
            'fotos.*' => 'image|max:10240',
        ]);

        try {
            DB::transaction(function () {
                // A. Crear Mascota
                $mascota = Mascota::create([
                    'nombre' => $this->nombre,
                    'especie' => $this->especie,
                    'raza' => $this->raza,
                    'peso' => $this->peso,
                    'fecha_nacimiento' => $this->fecha_nacimiento,
                    'sexo' => $this->sexo,
                    'propietario_id' => $this->propietario_id,
                ]);

                // B. Subir Fotos
                if ($this->fotos) {
                    foreach ($this->fotos as $foto) {
                        // Guardar archivo físico
                        $url = $foto->store('mascotas', 'public');

                        // Guardar en BDD
                        MascotaFoto::create([
                            'mascota_id' => $mascota->id,
                            'url' => $url
                        ]);
                    }
                }
            });

            // Éxito
            $this->success(
                'Mascota registrada',
                'Se guardó correctamente.',
                redirectTo: route('mascotas.index')
            );
        } catch (\Exception $e) {
            // Si falla, te mostrará el error exacto
            dd("Error: " . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.mascotas.create', [
            'usuarios' => User::all()
        ]);
    }
}
