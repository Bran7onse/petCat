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
            {{-- Create Mascota Form --}}
            <x-mary-form wire:submit="store">
                {{-- Información Básica --}}
                <div class="mb-6">
                    <x-mary-header title="Información Básica" size="text-lg" class="!mb-4"/>
                    <x-form.info-card columncard="3">
                        <x-mary-input label="Nombres" wire:model="nombre" placeholder="Ingrese los nombres" icon="o-user" inline />
                        <x-mary-select label="Especie" wire:model="especie" :options="$especies" placeholder="Seleccione la especie" icon="s-plus" inline />
                        <x-mary-select label="Propietario" wire:model="propietario" :options="$usuarios" placeholder="Seleccione el propietario" icon="o-user" inline />
                    </x-form.info-card>
                </div>

                {{-- Información  --}}
                <div class="mb-6">
                    <x-mary-header title="Información de Contacto" size="text-lg" class="!mb-4"/>
                    <x-form.info-card :columncard="2">
                        <x-mary-input label="Raza" type="text" wire:model="raza" placeholder="Ingrese la raza" icon="o-tag" inline />
                        <x-mary-input label="Peso" type="number" step="0.01" wire:model="peso" placeholder="Ingrese el peso en kg" icon="o-scale" inline />
                    </x-form.info-card>
                </div>

                {{-- Fotos de la Mascota --}}
                <div class="mb-6">
                    <x-mary-header title="Fotos de la Mascota" size="text-lg" class="!mb-4"/>
                    <x-mary-file wire:model="fotos" multiple accept="image/png, image/jpeg" hint="Máximo 1000KB por imagen">
                        <x-mary-button icon="o-photo" class="btn-outline">Subir Fotos</x-mary-button>
                    </x-mary-file>
                    
                    @if($fotos)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                            @foreach($fotos as $key => $foto)
                                <div class="relative group">
                                    <img src="{{ $foto->temporaryUrl() }}" class="w-full h-32 object-cover rounded-lg shadow-md">
                                    <button type="button" wire:click="removeFoto({{ $key }})" 
                                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <x-mary-icon name="o-x-mark" class="w-4 h-4" />
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Actions --}}
                <x-slot:actions>
                    <x-mary-button label="Cancelar" link="{{ route('mascotas.index') }}" icon="o-x-mark" />
                    <x-mary-button label="Crear Mascota" class="btn-primary" type="submit" spinner="store" icon="o-check" />
                </x-slot:actions>
            </x-mary-form>
        </div>
    </x-form.card>
</div>
