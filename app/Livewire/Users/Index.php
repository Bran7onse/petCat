<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class Index extends Component
{
    
    use WithPagination, Toast;
    public bool $showDrawer1 = false;
    public ?int $selectedUserId = null;

    # Search
    public string $search = '';

    # Header Section
    public string $title = 'Lista de Usuarios';
    public string $subtitle = 'Administración de usuarios del sistema';

    /* Sorting and Pagination - Table */
    public array $sortBy = ['column' => 'id', 'direction' => 'asc'];
    public array $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'NOMBRE'],
        ['key' => 'lastname', 'label' => 'APELLIDO'],
        ['key' => 'phone', 'label' => 'TELEFONO'],
        ['key' => 'email', 'label' => 'EMAIL'],
        //['key' => 'created_at', 'label' => 'CREATED AT', 'sortable' => false],
        ['key' => 'roles', 'label' => 'ROL'],
    ];
    
    /* Breadcrumbs */
    public array $breadcrumbs = [
        ['link' => '/dashboard', 'icon' => 's-home'],
        ['label' => 'Usuarios', 'icon' => 's-users'],
    ];

    public int $perPage = 10;

    protected $listeners = ['user-updated' => 'closeDrawer'];
    
    // Reset pagination on search update
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function edit($userId)
    {
        $this->selectedUserId = $userId;
        $this->showDrawer1 = true;
    }

    public function closeDrawer()
    {
        $this->showDrawer1 = false;
        $this->selectedUserId = null;
    }


   // Authorization
    public function mount()
    {
        $this->authorize(User::class);
    }

    /* Eliminar Usuario */
    public function deleteUser($userId)
    {
        // Authorization
        $this->authorize('eliminar usuarios', User::class);
        
        $user = User::findOrFail($userId);
        $user->delete();

        $this->error(
            'Usuario eliminado',
            'El usuario ha sido eliminado exitosamente',
        );
    }

    public function render()
    {
        return view('livewire.users.index', [
            'users' => User::query()
                ->with('roles')
                // Buscar en múltiples columnas
                ->when($this->search, fn($query) => 
                    $query->whereAny(['name', 'lastname', 'email', 'phone'], 'like', "%{$this->search}%")
                )
                ->orderBy(...array_values($this->sortBy))
                ->paginate($this->perPage),
        ]);
    }
}