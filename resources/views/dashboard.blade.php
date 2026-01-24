<x-layouts.app :title="__('Dashboard')">
    <div class="w-full space-y-6 font-poppins">

        {{-- HERO / ENCABEZADO --}}
        <div
            class="relative overflow-hidden rounded-3xl border border-black/5 bg-gradient-to-br from-primary/10 to-secondary/10 p-6 md:p-8">
            <div class="pointer-events-none absolute -top-24 -right-24 h-72 w-72 rounded-full bg-secondary/15 blur-2xl"></div>
            <div class="pointer-events-none absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-primary/15 blur-2xl"></div>

            <div class="relative flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="flex items-start gap-4">
                    <div
                        class="grid h-14 w-14 place-items-center rounded-2xl bg-white shadow-sm border border-black/5">
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
                    <div
                        class="flex items-center gap-2 rounded-full bg-white/70 px-4 py-2 border border-black/5 shadow-sm">
                        <span class="material-icons-sharp text-secondary">verified_user</span>
                        <span class="text-sm font-semibold text-primary">Acceso seguro</span>
                    </div>

                    <a href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-accent-orange px-6 py-3 font-bold text-white shadow-lg shadow-orange-200 hover:-translate-y-0.5 hover:bg-[#e65a2a] transition-all">
                        <span class="material-icons-sharp">add_circle</span>
                        Nueva cita
                    </a>
                </div>
            </div>
        </div>

        {{-- KPIs --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- Card 1 --}}
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

            {{-- Card 2 --}}
            <div class="rounded-3xl border border-black/5 bg-white p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold">Mascotas activas</p>
                        <p class="text-3xl font-extrabold text-dark mt-1">342</p>
                        <p class="text-xs text-gray-500 mt-2">24 con recordatorios próximos</p>
                    </div>
                    <div class="grid h-11 w-11 place-items-center rounded-2xl bg-secondary/10">
                        <span class="material-icons-sharp text-secondary">pets</span>
                    </div>
                </div>
            </div>

            {{-- Card 3 --}}
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
            {{-- Acciones rápidas --}}
            <div class="rounded-3xl border border-black/5 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-extrabold text-dark mb-4 flex items-center gap-2">
                    <span class="material-icons-sharp text-primary">bolt</span>
                    Acciones rápidas
                </h2>

                <div class="space-y-3">
                    <a href="#"
                        class="flex items-center justify-between rounded-2xl border border-black/5 p-4 hover:bg-light-gray transition">
                        <div class="flex items-center gap-3">
                            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-secondary/10">
                                <span class="material-icons-sharp text-secondary">add</span>
                            </div>
                            <div>
                                <p class="font-bold text-dark">Registrar mascota</p>
                                <p class="text-xs text-gray-500">Nuevo perfil + historial</p>
                            </div>
                        </div>
                        <span class="material-icons-sharp text-gray-400">chevron_right</span>
                    </a>

                    <a href="#"
                        class="flex items-center justify-between rounded-2xl border border-black/5 p-4 hover:bg-light-gray transition">
                        <div class="flex items-center gap-3">
                            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-primary/10">
                                <span class="material-icons-sharp text-primary">medical_information</span>
                            </div>
                            <div>
                                <p class="font-bold text-dark">Historial clínico</p>
                                <p class="text-xs text-gray-500">Vacunas, tratamientos</p>
                            </div>
                        </div>
                        <span class="material-icons-sharp text-gray-400">chevron_right</span>
                    </a>

                    <a href="#"
                        class="flex items-center justify-between rounded-2xl border border-black/5 p-4 hover:bg-light-gray transition">
                        <div class="flex items-center gap-3">
                            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-accent-orange/10">
                                <span class="material-icons-sharp text-accent-orange">calendar_month</span>
                            </div>
                            <div>
                                <p class="font-bold text-dark">Agendar cita</p>
                                <p class="text-xs text-gray-500">Agenda veterinaria</p>
                            </div>
                        </div>
                        <span class="material-icons-sharp text-gray-400">chevron_right</span>
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

                    <a href="#" class="text-sm font-bold text-primary hover:text-secondary transition">
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
                            <tr class="border-b border-black/5">
                                <td class="py-4 font-semibold">09:30</td>
                                <td class="py-4">Luna 🐶</td>
                                <td class="py-4">María Q.</td>
                                <td class="py-4">
                                    <span
                                        class="inline-flex items-center rounded-full bg-accent-yellow/20 px-3 py-1 text-xs font-bold text-dark">
                                        Pendiente
                                    </span>
                                </td>
                            </tr>
                            <tr class="border-b border-black/5">
                                <td class="py-4 font-semibold">11:00</td>
                                <td class="py-4">Simba 🐱</td>
                                <td class="py-4">Carlos P.</td>
                                <td class="py-4">
                                    <span
                                        class="inline-flex items-center rounded-full bg-secondary/15 px-3 py-1 text-xs font-bold text-secondary">
                                        Confirmado
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 font-semibold">15:45</td>
                                <td class="py-4">Milo 🐶</td>
                                <td class="py-4">Sofía V.</td>
                                <td class="py-4">
                                    <span
                                        class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-xs font-bold text-primary">
                                        Atención
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>