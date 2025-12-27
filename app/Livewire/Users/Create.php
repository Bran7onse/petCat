<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Mary\Traits\Toast;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use Toast;
    # Header Section
    public string $title = 'Crear nuevo Usuario';
    public string $subtitle = 'Administración de usuarios del sistema';

    /* Breadcrumbs */
    public array $breadcrumbs = [
        ['link' => '/dashboard', 'icon' => 's-home'],
        ['label' => 'Usuarios', 'link' => '/usuarios', 'icon' => 's-users'],
        ['label' => 'Crear nuevo Usuario', 'icon' => 's-users'],
    ];

    /* Variables de usuario */
    public $name;
    public $lastname;
    public $phone;
    public $email;
    public $password;
    public $password_confirmation;
    public $selectedRolUser;

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'selectedRolUser' => 'required|exists:roles,id',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'lastname.required' => 'El campo apellido es obligatorio',
            'email.required' => 'El campo correo es obligatorio',
            'email.unique' => 'Este correo ya está registrado',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'selectedRolUser.required' => 'Debe seleccionar un rol',
        ]);

        $user = User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        
        // Asignar el rol después de guardar el usuario
        if ($this->selectedRolUser) {
            $role = Role::find($this->selectedRolUser);
            $user->assignRole($role);
        }

        $this->success(
            'Usuario creado exitosamente',
            'El usuario ha sido registrado en el sistema',
            timeout: 5000,
            redirectTo: '/usuarios'
        );
    }

    // Authorization
    public function mount()
    {
        $this->authorize('crear usuarios', User::class);
    }

    public function render()
    {
        return view('livewire.users.create', [
            'roles' => Role::all()
        ]);
    }
}
