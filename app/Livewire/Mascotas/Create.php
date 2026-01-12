<?php

namespace App\Livewire\Mascotas;

use App\Models\Mascota;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast, WithFileUploads;
    # Header Section
    public string $title = 'Crear nueva Mascota';
    public string $subtitle = 'Administración de mascotas del sistema';

    /* Breadcrumbs */
    public array $breadcrumbs = [
        ['link' => '/dashboard', 'icon' => 's-home'],
        ['label' => 'Mascotas', 'link' => '/mascotas', 'icon' => 's-heart'],
        ['label' => 'Nueva Mascota', 'icon' => 's-plus'],
    ];

    /* Opciones de especie */
    public array $especies = [
        ['id' => 'gato', 'name' => 'Gato'],
        ['id' => 'perro', 'name' => 'Perro'],
    ];

    /* Variables de usuario */
    public $nombre;
    public $especie;
    public $raza;
    public $peso;
    public $fotos = [];
    public $propietario;

    // Para image library
    public function updatedFotos()
    {
        $this->validate([
            'fotos.*' => 'image|max:1000',
        ]);
    }

    public function removeFoto($key)
    {
        array_splice($this->fotos, $key, 1);
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:20',
            'peso' => 'required|numeric',
            'fotos.*' => 'nullable|image|max:100',
            'propietario' => 'required|exists:users,id',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'especie.required' => 'El campo especie es obligatorio',
            'peso.required' => 'El campo peso es obligatorio',
            'fotos.*.image' => 'El archivo debe ser una imagen',
            'fotos.*.max' => 'La imagen no debe superar 1000KB',
            'propietario.required' => 'Debe seleccionar un propietario',
        ]);

        // Guardar fotos
        $fotosGuardadas = [];
        if (!empty($this->fotos)) {
            foreach ($this->fotos as $foto) {
                $fotosGuardadas[] = $foto->store('mascotas', 'public');
            }
        }

        $mascosta = Mascota::create([
            'nombre' => $this->nombre,
            'especie' => $this->especie,
            'raza' => $this->raza,
            'peso' => $this->peso,
            'fotos' => json_encode($fotosGuardadas),
            'propietario_id' => $this->propietario,
        ]);

        $this->success(
            'Mascota creada exitosamente',
            'La mascota ha sido registrada en el sistema',
            timeout: 5000,
            redirectTo: '/mascotas'
        );
    }

    // Authorization
    public function mount()
    {
        $this->authorize('crear mascotas', Mascota::class);
    }

    public function render()
    {
        return view('livewire.mascotas.create', [
            'usuarios' => User::all()
        ]);
    }
}
