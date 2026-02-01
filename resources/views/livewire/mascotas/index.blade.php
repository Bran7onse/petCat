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
        <x-mary-table :headers="$headers" :rows="$mascotas" :sort-by="$sortBy">

            {{-- 1. PERSONALIZAR LA CELDA DE FOTOS --}}
            @scope('cell_fotos', $mascota)
            <div class="avatar">
                {{-- Quitamos ring y ring-primary para eliminar el círculo azul --}}
                {{-- Añadimos shadow-sm y border para un acabado más limpio --}}
                <div class="w-12 h-12 rounded-full border border-zinc-200 dark:border-zinc-700 overflow-hidden shadow-sm bg-zinc-100">

                    @if($mascota->fotos && $mascota->fotos->count() > 0)
                    {{-- La clase 'object-cover' es vital para que la imagen no se estire --}}
                    <img src="{{ asset('storage/' . $mascota->fotos->first()->url) }}"
                        alt="Mascota"
                        class="w-full h-full object-cover" />
                    @else
                    {{-- Imagen por defecto --}}
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($mascota->nombre) }}&background=random&color=fff"
                        class="w-full h-full object-cover" />
                    @endif

                </div>
            </div>
            @endscope

            {{-- 2. PERSONALIZAR LA CELDA DE PROPIETARIO (Opcional, si quieres ver el nombre del dueño) --}}
            @scope('cell_propietario', $mascota)
            <div class="font-bold text-zinc-600">
                {{ $mascota->propietario->name ?? 'Sin asignar' }}
            </div>
            @endscope

            {{-- Acciones (Editar/Eliminar) --}}
            @scope('actions', $mascota)
            <div class="flex gap-2">
                <x-mary-button icon="o-pencil" class="btn-sm btn-ghost text-blue-500" wire:click="edit({{ $mascota->id }})" />
                <x-mary-button icon="o-trash" class="btn-sm btn-ghost text-red-500" wire:click="deleteMascota({{ $mascota->id }})" />
            </div>
            @endscope

        </x-mary-table>
    </div>
</div>