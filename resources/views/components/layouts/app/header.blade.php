<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')

    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<body class="min-h-screen bg-white dark:bg-zinc-800 font-poppins">
    <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <a href="{{ route('home') }}" class="ms-2 me-5 flex items-center space-x-2 lg:ms-0" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </flux:navbar.item>
        </flux:navbar>

        <flux:spacer />

        {{-- SI ESTÁ LOGUEADO --}}
        @auth
        <flux:dropdown position="bottom" align="end">
            <flux:profile class="cursor-pointer" :initials="auth()->user()->initials()" />

            <flux:menu class="w-48">
                <div class="px-2 py-1.5 text-sm">
                    <div class="font-semibold">{{ auth()->user()->name }}</div>
                    <div class="text-xs opacity-50">{{ auth()->user()->email }}</div>
                </div>
                <flux:menu.separator />
                <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                <flux:menu.separator />
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full text-red-500">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
        @endauth

        {{-- SI NO ESTÁ LOGUEADO (Invitado) --}}
        @guest
        <flux:navbar>
            <flux:navbar.item href="{{ route('login') }}" wire:navigate>{{ __('Login') }}</flux:navbar.item>
        </flux:navbar>
        @endguest
    </flux:header>

    {{-- MOBILE SIDEBAR --}}
    <flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="ms-1 flex items-center space-x-2" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')">
                <flux:navlist.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        @auth
        <form method="POST" action="{{ route('logout') }}" class="flex items-center">
            @csrf
            <button
                type="submit"
                class="flex items-center gap-2 rounded-full bg-red-500 px-4 py-2 text-sm font-bold text-white hover:bg-red-600 transition">
                <span class="material-icons-sharp text-sm">logout</span>
                Cerrar sesión
            </button>
        </form>

        @endauth
    </flux:sidebar>

    <flux:main>
        {{ $slot }}
    </flux:main>

    @fluxScripts
</body>

</html>