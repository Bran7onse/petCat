<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

{{-- AGREGAMOS 'flex' y 'overflow-hidden' al body para layout de dashboard --}}

<body class="min-h-screen bg-light-gray text-dark dark:bg-zinc-900 dark:text-white font-poppins flex antialiased">

    {{-- SIDEBAR (Izquierda) --}}
    {{-- Agregamos clases para que sea flex column y ocupe el alto total --}}
    <flux:sidebar
        sticky
        stashable
        class="border-r border-black/5 bg-white dark:border-white/10 dark:bg-zinc-900 w-64 h-screen flex flex-col justify-between py-6 overflow-y-auto flex-shrink-0">

        {{-- SECCIÓN SUPERIOR: Logo y Menú --}}
        <div>
            <flux:sidebar.toggle class="lg:hidden mb-4" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-2 mb-8" wire:navigate>
                <x-app-logo class="h-8 w-auto" />
                {{-- Opcional: Nombre de la app al lado del logo --}}
                <span class="font-bold text-lg">PetCare</span>
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Plataforma')" class="grid gap-2">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Panel de control') }}
                    </flux:navlist.item>
                </flux:navlist.group>

                @can('ver usuarios')
                <flux:navlist.group :heading="__('Usuarios')" class="grid gap-2 mt-4">
                    <flux:navlist.item icon="users" :href="route('users.index')" :current="request()->routeIs('users.*')" wire:navigate>
                        {{ __('Todos los Usuarios') }}
                    </flux:navlist.item>
                </flux:navlist.group>
                @endcan

                @can('ver mascotas')
                <flux:navlist.group :heading="__('Mascotas')" class="grid gap-2 mt-4">
                    <flux:navlist.item :href="route('mascotas.index')" :current="request()->routeIs('mascotas.*')" wire:navigate>
                        <x-slot:icon>
                            <x-gmdi-pets-o class="w-5 h-5" />
                        </x-slot:icon>
                        {{ __('Todas las Mascotas') }}
                    </flux:navlist.item>
                </flux:navlist.group>
                @endcan
            </flux:navlist>
        </div>

        {{-- SECCIÓN INFERIOR: Usuario y Logout (VISIBLE SIEMPRE) --}}
        <div class="mt-auto px-2 pt-4 border-t border-gray-200 dark:border-gray-700">
            {{-- Info Usuario --}}
            <div class="flex items-center gap-3 mb-4 px-2">
                <div class="bg-gray-200 dark:bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center font-bold text-sm">
                    {{ auth()->user()->initials() }}
                </div>
                <div class="overflow-hidden">
                    <div class="text-sm font-semibold truncate">{{ auth()->user()->name }}</div>
                    <div class="text-xs opacity-70 truncate">{{ auth()->user()->email }}</div>
                </div>
            </div>

            {{-- Botón Configuración (Opcional) --}}
            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900 dark:hover:text-white mb-3 px-2 transition"
                wire:navigate>
                <x-mary-icon name="o-cog" class="w-4 h-4" />
                Configuración
            </a>



            {{-- BOTÓN CERRAR SESIÓN (GRANDE Y ROJO) --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-50 text-red-600 border border-red-200 hover:bg-red-500 hover:text-white font-medium py-2 px-4 rounded-lg transition-all duration-200 shadow-sm">
                    <x-mary-icon name="o-arrow-right-start-on-rectangle" class="w-5 h-5" />
                    <span>{{ __('Cerrar sesión') }}</span>
                </button>
            </form>
        </div>

    </flux:sidebar>

    {{-- WRAPPER PARA CONTENIDO PRINCIPAL --}}
    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        {{-- Header Móvil (Solo se ve en pantallas pequeñas) --}}
        <flux:header class="lg:hidden bg-white border-b border-black/5 dark:bg-zinc-900 dark:border-white/10 px-4 py-3 flex items-center justify-between shrink-0">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" />
            <span class="font-bold">PetCare</span>
            <div class="w-6"></div> {{-- Espaciador para centrar el texto --}}
        </flux:header>

        {{-- CONTENIDO PRINCIPAL (Derecha) --}}
        {{-- 'flex-1 overflow-y-auto' permite que solo esta parte tenga scroll --}}
        <flux:main class="flex-1 overflow-y-auto bg-gray-50 dark:bg-black/20 p-6">
            <div class="max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </flux:main>
    </div>

    @fluxScripts
</body>

</html>