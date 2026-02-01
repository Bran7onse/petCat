<x-layouts.app :title="__('Dashboard')">
    <div class="w-full space-y-6 font-poppins">

        {{-- HERO / ENCABEZADO --}}
        <div class="relative overflow-hidden rounded-3xl border border-black/5 bg-gradient-to-br from-primary/10 to-secondary/10 p-6 md:p-8">
            <div class="pointer-events-none absolute -top-24 -right-24 h-72 w-72 rounded-full bg-secondary/15 blur-2xl"></div>
            <div class="pointer-events-none absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-primary/15 blur-2xl"></div>

            <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="flex items-start gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-white shadow-sm border border-black/5">
                        <span class="material-icons-sharp text-primary text-3xl">pets</span>
                    </div>

                    <div>
                        <h1 class="text-2xl md:text-3xl font-extrabold text-dark leading-tight">
                            🐾 Panel de control PetCare
                        </h1>
                        <p class="text-gray-600">
                            Gestiona tus mascotas, citas y atención veterinaria en un solo lugar.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="flex items-center gap-2 rounded-full bg-white/70 px-4 py-2 border border-black/5 shadow-sm">
                        <span class="material-icons-sharp text-secondary">verified_user</span>
                        <span class="text-sm font-semibold text-primary">Acceso seguro</span>
                    </div>

                    <a href="{{ route('citas.create') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-accent-orange px-6 py-3 font-bold text-white transition hover:scale-105">
                        <span class="material-icons-sharp">add_circle</span>
                        Nueva cita
                    </a>
                </div>
            </div>
        </div>

        {{-- KPIs --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="rounded-3xl border border-black/5 bg-white p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold">Dueños registrados</p>
                        <p class="text-3xl font-extrabold text-dark mt-1">128</p>
                        <p class="text-xs text-gray-500 mt-2">+12 este mes</p>
                    </div>
                    <div class="grid h-11 w-11 place-items-center rounded-2xl bg-primary/10">
                        <span class="material-icons-sharp text-primary">person</span>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl border border-black/5 bg-white p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold">Mascotas activas</p>
                        <p class="text-3xl font-extrabold text-dark mt-1">
                            {{ $recordatoriosPendientes }}
                        </p>
                        <p class="text-xs text-gray-500 mt-2">Recordatorios pendientes</p>
                    </div>
                    <div class="grid h-11 w-11 place-items-center rounded-2xl bg-secondary/10">
                        <span class="material-icons-sharp text-secondary">pets</span>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl border border-black/5 bg-white p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold">Citas de hoy</p>
                        <p class="text-3xl font-extrabold text-dark mt-1">9</p>
                        <p class="text-xs text-gray-500 mt-2">2 pendientes de confirmación</p>
                    </div>
                    <div class="grid h-11 w-11 place-items-center rounded-2xl bg-accent-orange/10">
                        <span class="material-icons-sharp text-accent-orange">event</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- CUERPO --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

            {{-- ACCIONES RÁPIDAS (ACTUALIZADO) --}}
            <div class="rounded-3xl border border-black/5 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-extrabold text-dark mb-4 flex items-center gap-2">
                    <span class="material-icons-sharp text-primary">bolt</span>
                    Acciones rápidas
                </h2>

                <div class="space-y-3">
                    {{-- 1. Registrar Mascota --}}
                    <a href="{{ route('mascotas.create') }}"
                        class="flex items-center justify-between rounded-2xl border border-black/5 p-4 hover:bg-primary/5 hover:border-primary/20 transition group">
                        <div class="flex items-center gap-3">
                            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-secondary/10 group-hover:bg-secondary/20 transition">
                                <span class="material-icons-sharp text-secondary">add</span>
                            </div>
                            <div>
                                <p class="font-bold text-dark">Registrar mascota</p>
                                <p class="text-xs text-gray-500">Nuevo perfil + historial</p>
                            </div>
                        </div>
                        <span class="material-icons-sharp text-gray-400 group-hover:text-primary transition">chevron_right</span>
                    </a>

                    {{-- 2. Historial Clínico (Ver listado de mascotas) --}}
                    <a href="{{ route('mascotas.index') }}"
                        class="flex items-center justify-between rounded-2xl border border-black/5 p-4 hover:bg-primary/5 hover:border-primary/20 transition group">
                        <div class="flex items-center gap-3">
                            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition">
                                <span class="material-icons-sharp text-primary">medical_information</span>
                            </div>
                            <div>
                                <p class="font-bold text-dark">Mis Mascotas</p>
                                <p class="text-xs text-gray-500">Ver listado e historial</p>
                            </div>
                        </div>
                        <span class="material-icons-sharp text-gray-400 group-hover:text-primary transition">chevron_right</span>
                    </a>

                    {{-- 3. Agendar Cita --}}
                    <a href="{{ route('citas.create') }}"
                        class="flex items-center justify-between rounded-2xl border border-black/5 p-4 hover:bg-primary/5 hover:border-primary/20 transition group">
                        <div class="flex items-center gap-3">
                            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-accent-orange/10 group-hover:bg-accent-orange/20 transition">
                                <span class="material-icons-sharp text-accent-orange">calendar_month</span>
                            </div>
                            <div>
                                <p class="font-bold text-dark">Agendar cita</p>
                                <p class="text-xs text-gray-500">Agenda veterinaria</p>
                            </div>
                        </div>
                        <span class="material-icons-sharp text-gray-400 group-hover:text-primary transition">chevron_right</span>
                    </a>
                </div>
            </div>

            {{-- Tabla citas --}}
            <div class="lg:col-span-2 rounded-3xl border border-black/5 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-extrabold text-dark flex items-center gap-2">
                        <span class="material-icons-sharp text-secondary">event_available</span>
                        Citas de hoy
                    </h2>

                    <a href="{{ route('citas.index') }}"
                        class="text-sm font-bold text-primary hover:text-secondary transition">
                        Ver todas
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="text-gray-500">
                            <tr class="border-b border-black/5">
                                <th class="text-left py-3 font-semibold">Hora</th>
                                <th class="text-left py-3 font-semibold">Mascota</th>
                                <th class="text-left py-3 font-semibold">Dueño</th>
                                <th class="text-left py-3 font-semibold">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @forelse($citasHoy as $cita)
                            <tr class="border-b border-black/5 hover:bg-gray-50/50">
                                <td class="py-4 font-semibold text-primary">
                                    {{ \Carbon\Carbon::parse($cita->fecha . ' ' . $cita->hora)->format('H:i') }}
                                </td>
                                <td class="py-4 font-medium">{{ $cita->mascota }} 🐾</td>
                                <td class="py-4 text-gray-600">{{ auth()->user()->name }}</td>
                                <td class="py-4">
                                    @php
                                    $colores = [
                                    'pendiente' => 'bg-amber-100 text-amber-700',
                                    'confirmada' => 'bg-emerald-100 text-emerald-700',
                                    'atendida' => 'bg-blue-100 text-blue-700',
                                    'cancelada' => 'bg-red-100 text-red-700',
                                    ];
                                    @endphp
                                    <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold {{ $colores[$cita->estado] ?? 'bg-gray-100 text-gray-600' }}">
                                        {{ ucfirst($cita->estado) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-10 text-gray-400">
                                    <span class="material-icons-sharp text-4xl block mb-2">event_busy</span>
                                    No tienes citas para hoy
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>