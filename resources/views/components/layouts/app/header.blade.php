<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 1024px) {
            body {
                flex-direction: row;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800 font-poppins antialiased">

    {{-- 1. SIDEBAR (Barra Lateral Izquierda) --}}
    <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 lg:w-64 flex flex-col justify-between h-screen py-6">

        <div>
            {{-- Toggle para Móvil --}}
            <flux:sidebar.toggle class="lg:hidden mb-4" icon="x-mark" />

            {{-- Logo --}}
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-2 mb-8" wire:navigate>
                <x-app-logo class="h-8 w-auto" />
                <span class="font-bold text-lg text-zinc-800 dark:text-white">PetCare</span>
            </a>

            {{-- Menú de Navegación --}}
            <flux:navlist variant="outline">
                <flux:navlist.group heading="Plataforma">
                    <flux:navlist.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        Dashboard
                    </flux:navlist.item>

                    <flux:navlist.item icon="users" href="#" wire:navigate>
                        Mascotas
                    </flux:navlist.item>

                    <flux:navlist.item icon="user" href="#" wire:navigate>
                        Dueños
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
        </div>

        {{-- SECCIÓN INFERIOR: Usuario y Botón Cerrar Sesión VISIBLE --}}
        <div class="mt-auto px-2 border-t border-zinc-200 dark:border-zinc-700 pt-4">

            @auth
            {{-- Info del Usuario --}}
            <div class="flex items-center gap-3 mb-4 px-2">
                <div class="bg-indigo-100 text-indigo-700 rounded-full w-10 h-10 flex items-center justify-center font-bold">
                    {{ auth()->user()->initials() }}
                </div>
                <div class="overflow-hidden">
                    <div class="text-sm font-semibold truncate">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-zinc-500 truncate">{{ auth()->user()->email }}</div>
                </div>
            </div>

            {{-- BOTÓN CERRAR SESIÓN (Grande y Visible) --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-50 text-red-600 hover:bg-red-100 border border-red-200 font-medium py-2 px-4 rounded-lg transition-colors">
                    <span class="text-lg">🚪</span> {{-- Icono simple si no carga material icons --}}
                    <span>Cerrar Sesión</span>
                </button>
            </form>
            @endauth

        </div>
    </flux:sidebar>

    {{-- HEADER SOLO PARA MÓVIL (Se oculta en escritorio para que el contenido suba) --}}
    <flux:header class="lg:hidden border-b border-zinc-200 bg-white dark:bg-zinc-900 px-4 py-2">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" />
        <flux:spacer />
        <span class="font-bold">PetCare</span>
    </flux:header>

    {{-- 2. CONTENIDO PRINCIPAL (Derecha) --}}
    <flux:main class="flex-1 overflow-y-auto h-screen p-6">
        {{ $slot }}
    </flux:main>

    @fluxScripts
</body>

</html>