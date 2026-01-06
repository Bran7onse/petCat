<x-layouts.app.sidebar :title="$title ?? null">
    {{-- CONTENEDOR PRINCIPAL DEL DASHBOARD --}}
    <div class="min-h-screen w-full bg-light-gray font-poppins text-dark">
        <flux:main class="w-full p-6 lg:p-10">
            {{ $slot }}
        </flux:main>
    </div>
</x-layouts.app.sidebar>
