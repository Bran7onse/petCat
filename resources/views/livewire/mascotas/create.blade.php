<div class="container mx-auto max-w-5xl pb-10">
    {{-- Notificaciones --}}
    <x-mary-toast />

    {{-- Navegación superior optimizada --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 px-4 sm:px-0">
        <x-mary-breadcrumbs :items="$breadcrumbs" separator="o-chevron-right" class="text-sm opacity-70" />

        <div class="flex items-center gap-2">
            <div class="size-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center shadow-sm">
                <x-mary-icon name="o-sparkles" class="w-6 h-6" />
            </div>
            <h1 class="text-2xl font-black tracking-tight text-zinc-800 dark:text-white">Registro de Mascota</h1>
        </div>
    </div>

    {{-- Card Principal con diseño más limpio --}}
    <div class="bg-white dark:bg-zinc-900 shadow-xl shadow-zinc-200/50 dark:shadow-none rounded-[2rem] border border-zinc-100 dark:border-zinc-800 overflow-hidden">

        <x-mary-form wire:submit="store">
            <div class="p-6 md:p-10 space-y-10">

                {{-- Bloque 1: Identidad --}}
                <section>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center size-8 rounded-lg bg-indigo-50 text-indigo-600 font-bold text-sm">01</span>
                        <h2 class="text-lg font-bold text-zinc-700 dark:text-zinc-200">Identidad Básica</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <x-mary-input label="Nombre de la mascota" wire:model="nombre" placeholder="Ej: Balto" icon="o-pencil-square" inline class="bg-zinc-50/50" />

                        <x-mary-select label="Especie" wire:model="especie" :options="$especies" placeholder="Seleccione..." icon="o-beaker" inline class="bg-zinc-50/50" />

                        <x-mary-select label="Dueño Responsable" wire:model="propietario_id" :options="$usuarios" placeholder="Seleccione un usuario..." icon="o-user" inline class="bg-zinc-50/50" />
                    </div>
                </section>

                <hr class="border-zinc-100 dark:border-zinc-800" />

                {{-- Bloque 2: Perfil Biológico --}}
                <section>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center size-8 rounded-lg bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 font-bold text-sm">02</span>
                        <h2 class="text-lg font-bold text-zinc-700 dark:text-zinc-200">Perfil Biológico</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <x-mary-input label="Raza" wire:model="raza" placeholder="Ej: Husky" icon="o-tag" inline />

                        <x-mary-input label="Peso" type="number" step="0.01" wire:model="peso" suffix="Kg" icon="o-scale" inline />

                        <x-mary-input label="Nacimiento" type="date" wire:model="fecha_nacimiento" icon="o-calendar-days" inline />

                        <x-mary-select label="Sexo" wire:model="sexo" :options="[['id' => 'Macho', 'name' => 'Macho'], ['id' => 'Hembra', 'name' => 'Hembra']]" icon="o-finger-print" inline />
                    </div>
                </section>

                {{-- Bloque 3: Galería --}}
                <section class="bg-zinc-50/50 dark:bg-zinc-800/30 p-8 rounded-[2rem] border-2 border-dashed border-zinc-200 dark:border-zinc-700">
                    <div class="text-center mb-6">
                        <div class="size-16 bg-white dark:bg-zinc-800 rounded-2xl shadow-sm flex items-center justify-center mx-auto mb-4 border border-zinc-100 dark:border-zinc-700">
                            <x-mary-icon name="o-camera" class="w-8 h-8 text-primary" />
                        </div>
                        <h3 class="font-bold text-xl text-zinc-700 dark:text-zinc-200">Álbum de Fotos</h3>
                        <p class="text-sm text-zinc-500 mt-1">Sube hasta 5 imágenes (JPG, PNG)</p>
                    </div>

                    <div class="flex flex-col items-center justify-center gap-4">
                        {{-- 1. Input oculto con validación inmediata --}}
                        <input
                            type="file"
                            id="upload_fotos"
                            wire:model.live="fotos" {{-- Añadimos .live para que refresque al instante --}}
                            multiple
                            accept="image/png, image/jpeg, image/jpg"
                            class="hidden" />

                        {{-- 2. Botón --}}
                        <label for="upload_fotos"
                            class="inline-flex items-center gap-2 px-8 py-3 bg-primary text-primary-content font-black uppercase tracking-widest text-xs rounded-2xl cursor-pointer shadow-xl shadow-primary/30 hover:bg-primary-focus hover:-translate-y-1 transition-all duration-200 active:scale-95">
                            <x-mary-icon name="o-arrow-up-tray" class="w-5 h-5" />
                            <span>Seleccionar Fotos</span>
                        </label>

                        {{-- Indicador de carga activo --}}
                        <div wire:loading wire:target="fotos" class="flex flex-col items-center gap-2">
                            <div class="flex items-center gap-2 text-primary font-bold bg-primary/10 px-4 py-2 rounded-full">
                                <span class="loading loading-spinner loading-sm"></span>
                                <span class="text-xs">Cargando previsualización...</span>
                            </div>
                        </div>

                        @error('fotos.*')
                        <div class="alert alert-error shadow-sm py-2 px-4 rounded-xl w-auto text-white text-xs font-bold">
                            <x-mary-icon name="o-exclamation-triangle" class="w-4 h-4" />
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                    {{-- Área de Previsualización Mejorada --}}
                    @if($fotos)
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-8 pt-6 border-t border-zinc-100 dark:border-zinc-800">
                        @foreach($fotos as $key => $foto)
                        {{-- Contenedor de la imagen con validación de seguridad --}}
                        <div class="relative aspect-square rounded-3xl overflow-hidden border-4 border-white dark:border-zinc-700 shadow-xl group bg-zinc-200 dark:bg-zinc-800">

                            {{-- Intentamos mostrar la URL temporal --}}
                            <img src="{{ $foto->temporaryUrl() }}"
                                class="w-full h-full object-cover transition duration-300 group-hover:scale-110"
                                onload="this.style.opacity=1"
                                style="opacity: 0">
                            @catch(\Exception $e)
                            <div class="flex items-center justify-center h-full text-zinc-400">
                                <x-mary-icon name="o-eye-slash" class="w-8 h-8" />
                            </div>
                            @endtry

                            {{-- Botón Eliminar --}}
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button type="button"
                                    wire:click="removeFoto({{ $key }})"
                                    class="btn btn-circle btn-error btn-sm text-white border-none shadow-lg">
                                    <x-mary-icon name="o-trash" class="w-4 h-4" />
                                </button>
                            </div>

                            {{-- Overlay de carga individual --}}
                            <div wire:loading wire:target="fotos" class="absolute inset-0 bg-white/50 dark:bg-black/50 flex items-center justify-center">
                                <span class="loading loading-dots loading-md text-primary"></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </section>
            </div>

            {{-- Barra de Acciones Estilo "Sticky" o fija al fondo --}}
            <div class="bg-zinc-50 dark:bg-zinc-800/50 px-6 py-6 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-zinc-100 dark:border-zinc-800">
                <p class="text-sm text-zinc-500">
                    <x-mary-icon name="o-information-circle" class="w-4 h-4 inline mb-1" />
                    Verifique que los datos de salud sean correctos.
                </p>
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <x-mary-button label="Descartar" link="{{ route('mascotas.index') }}" class="btn-ghost text-zinc-500 flex-1 md:flex-none" />
                    <x-mary-button label="Registrar Mascota 🐶 " type="submit" spinner="store" icon="o-check-badge" class="btn-primary px-10 rounded-2xl flex-1 md:flex-none shadow-lg shadow-primary/25" />
                </div>
            </div>
        </x-mary-form>
    </div>
</div>