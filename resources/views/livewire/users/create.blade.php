<div class="container mx-auto">
    {{-- Toast --}}
    <x-mary-toast />

    {{-- Breadcrumbs --}}
    <x-mary-breadcrumbs class="mb-4 px-4 sm:px-0" :items="$breadcrumbs" separator="o-slash" />

    {{-- Header Section --}}
    <x-mary-header title="{{$title}}" subtitle="{{$subtitle}}" separator/>

    {{-- Form Card --}}
    <x-form.card>
        <div class="p-6 sm:p-8">
            {{-- Create User Form --}}
            <x-mary-form wire:submit="store">
                {{-- Información Personal --}}
                <div class="mb-6">
                    <x-mary-header title="Información Personal" size="text-lg" class="!mb-4"/>
                    <x-form.info-card>
                        <x-mary-input label="Nombres" wire:model="name" placeholder="Ingrese los nombres" icon="o-user" inline />
                        <x-mary-input label="Apellidos" wire:model="lastname" placeholder="Ingrese los apellidos" icon="o-user" inline />
                    </x-form.info-card>
                </div>

                {{-- Información de Contacto --}}
                <div class="mb-6">
                    <x-mary-header title="Información de Contacto" size="text-lg" class="!mb-4"/>
                    <x-form.info-card>
                        <x-mary-input label="Teléfono" type="tel" wire:model="phone" placeholder="Ingrese el teléfono" icon="o-phone" inline />
                        <x-mary-input label="Email" type="email" wire:model="email" placeholder="correo@ejemplo.com" icon="o-envelope" inline />
                    </x-form.info-card>
                </div>

                {{-- Seguridad --}}
                <div class="mb-6">
                    <x-mary-header title="Seguridad" size="text-lg" class="!mb-4"/>
                    <x-form.info-card>
                        <x-mary-input label="Contraseña" type="password" wire:model="password" placeholder="Mínimo 8 caracteres" icon="o-lock-closed" inline />
                        <x-mary-input label="Confirmar Contraseña" type="password" wire:model="password_confirmation" placeholder="Confirme la contraseña" icon="o-lock-closed" inline />
                    </x-form.info-card>
                </div>

                {{-- Rol del Usuario --}}
                <div class="mb-6">
                    <x-mary-header title="Asignar Rol" size="text-lg" class="!mb-4"/>
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
                    <x-mary-button label="Cancelar" link="{{ route('users.index') }}" icon="o-x-mark" />
                    <x-mary-button label="Crear Usuario" class="btn-primary" type="submit" spinner="store" icon="o-check" />
                </x-slot:actions>
            </x-mary-form>
        </div>
    </x-form.card>
</div>
