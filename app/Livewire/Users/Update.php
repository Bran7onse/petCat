<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Mary\Traits\Toast;
use Spatie\Permission\Models\Role;

class Update extends Component
{
    use Toast;

    public $userId;
    public $name;
    public $lastname;
    public $phone;
    public $email;
    public $selectedRolUser;

    public function mount($userId)
    {

        // Authorization
        $this->authorize('editar usuarios', User::class);

        $user = User::findOrFail($userId);
        
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->selectedRolUser = $user->roles->first()?->id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'selectedRolUser' => 'required|exists:roles,id',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'lastname.required' => 'El campo apellido es obligatorio',
            'email.required' => 'El campo correo es obligatorio',
            'email.unique' => 'Este correo ya está registrado',
            'selectedRolUser.required' => 'Debe seleccionar un rol',
        ]);

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        // Sincronizar roles
        if ($this->selectedRolUser) {
            $role = Role::find($this->selectedRolUser);
            $user->syncRoles([$role]);
        }

        $this->dispatch('user-updated');
        $this->success(
            'Usuario actualizado exitosamente',
            'La información del usuario ha sido modificada'
        );
    }

    public function render()
    {
        return view('livewire.users.update', [
            'roles' => Role::all()
        ]);
    }
}
