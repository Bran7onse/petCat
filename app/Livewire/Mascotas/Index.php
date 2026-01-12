<?php

namespace App\Livewire\Mascotas;

use App\Models\Mascota;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class Index extends Component
{
    use WithPagination, Toast;
    public bool $showDrawer1 = false;
    
    # Search
    public string $search = '';

    # Header Section
    public string $title = 'Lista de Mascotas';
    public string $subtitle = 'Administración de mascotas';

    /* Sorting and Pagination - Table */
    public array $sortBy = ['column' => 'id', 'direction' => 'asc'];
    public array $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'nombre', 'label' => 'NOMBRE'],
        ['key' => 'especie', 'label' => 'ESPECIE'],
        ['key' => 'raza', 'label' => 'RAZA'],
        ['key' => 'peso', 'label' => 'PESO'],
        ['key' => 'fotos', 'label' => 'FOTOS'],
        ['key' => 'propietario', 'label' => 'PROPIETARIO'],
    ];

    /* Breadcrumbs */
    public array $breadcrumbs = [
        ['link' => '/dashboard', 'icon' => 's-home'],
        ['label' => 'Mascotas', 'icon' => 's-heart'],
    ];

    public int $perPage = 10;

    // Reset pagination on search update
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function edit($mascotaId)
    {
        // Logic to edit mascota
    }

    public function closeDrawer()
    {
        // Logic to close drawer
    }

    // Authorization
    public function mount()
    {
        $this->authorize('ver mascotas', Mascota::class);
    }

    // Eliminar Mascota
    public function deleteMascota($mascotaId)
    {
        // Authorization
        $this->authorize('eliminar mascotas', Mascota::class);

        $mascota = Mascota::findOrFail($mascotaId);
        $mascota->delete();

        $this->error(
            'Mascota eliminada',
            'La mascota ha sido eliminada del sistema'
        );
    }

    public function render()
    {
        return view('livewire.mascotas.index',[
            'mascotas' => Mascota::query()
                ->with('propietario')
                ->when($this->search, fn($query) =>
                    $query->whereAny(['nombre', 'especie', 'raza'], 'like', "%{ $this->search }%")
                )
                ->orderBy(...array_values($this->sortBy))
                ->paginate($this->perPage),
        ]);
    }
}
