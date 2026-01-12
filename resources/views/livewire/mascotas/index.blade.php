<div class="container mx-auto ">

    {{-- Toast --}}
    <x-mary-toast />

    {{-- Breadcrumbs --}}
    <x-mary-breadcrumbs class="mb-4 px-4 sm:px-0" :items="$breadcrumbs" separator="o-slash" />

    {{-- Header Section --}}
    <x-mary-header title="{{$title}}" subtitle="{{$subtitle}}" separator>
        <x-slot:middle class="!justify-end">
            <x-mary-input wire:model.live="search" icon="o-bolt" placeholder="Buscar usuarios..." />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" link="{{ route('mascotas.create') }}" />
        </x-slot:actions>
    </x-mary-header>

    {{-- Drawer para Editar --}}
{{-- 
    <x-mary-drawer wire:model="showDrawer1" right class="w-11/12 lg:w-1/3" title="Editar Usuario" subtitle="Modificar la información del usuario" separator>
        @if($selectedUserId)
            @livewire('mascotas.update', ['mascotaId' => $selectedUserId], key($selectedUserId))
        @endif
    </x-mary-drawer>
 --}}
    {{-- Table Card --}}
    <div class="bg-white dark:bg-gray-800 sm:rounded-lg shadow overflow-hidden pb-4">
        {{-- Mascotas Table --}}
        <x-mary-table 
            :headers="$headers" 
            :rows="$mascotas" 
            :sort-by="$sortBy" 
            with-pagination
            per-page="perPage"
            :per-page-values="[10, 20, 50, 100]"
            striped
            class="table-auto"
        >

            @scope('cell_propietario', $mascota)
                {{ $mascota->propietario ? $mascota->propietario->name . ' ' . $mascota->propietario->lastname : 'Sin propietario' }}
            @endscope

            @scope('actions', $mascota)
                <x-mary-dropdown icon="o-ellipsis-vertical" variant="ghost" class="btn-sm btn-ghost">
                    <x-mary-menu-item title="Editar" icon="o-pencil" class="btn-sm btn-ghost" tooltip="Editar" wire:click="edit({{ $mascota->id }})" separator />
                    <x-mary-menu-item title="Ver" icon="o-eye" class="btn-sm btn-ghost" tooltip="Ver" />
                    <x-mary-menu-item title="Eliminar" icon="o-trash" class="btn-sm btn-ghost text-error" tooltip="Eliminar" wire:click="deleteMascota({{ $mascota->id }})" wire:confirm="¿Estás seguro de eliminar este usuario? Esta acción no se puede deshacer." />
                </x-mary-dropdown>
            @endscope
        </x-mary-table>
    </div>
</div>
