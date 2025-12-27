<div>
    <x-mary-form wire:submit="update">
        {{-- Información Personal --}}
        <x-form.info-card>
            <x-mary-input label="Nombres" wire:model="name" placeholder="Ingrese los nombres" icon="o-user" inline />
            <x-mary-input label="Apellidos" wire:model="lastname" placeholder="Ingrese los apellidos" icon="o-user" inline />
        </x-form.info-card>

        {{-- Información de Contacto --}}
        <div class="mt-4">
            <x-form.info-card>
                <x-mary-input label="Teléfono" type="tel" wire:model="phone" placeholder="Ingrese el teléfono" icon="o-phone" inline />
                <x-mary-input label="Email" type="email" wire:model="email" placeholder="correo@ejemplo.com" icon="o-envelope" inline />
            </x-form.info-card>
        </div>

        {{-- Rol del Usuario --}}
        <div class="mt-4">
            <x-form.info-card>
                <x-mary-select 
                    label="Asignar Rol" 
                    wire:model="selectedRolUser" 
                    :options="$roles" 
                    icon="o-shield-check" 
                    placeholder="Seleccione un rol"
                    inline
                />
            </x-form.info-card>
        </div>

        {{-- Actions --}}
        <x-slot:actions>
            <x-mary-button label="Actualizar" class="btn-primary" type="submit" spinner="update" icon="o-check" />
        </x-slot:actions>
    </x-mary-form>
</div>