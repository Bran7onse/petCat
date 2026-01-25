<x-layouts.app title="Agendar cita">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-3xl shadow-sm border border-black/5">
        <h1 class="text-2xl font-extrabold text-dark mb-6 flex items-center gap-2">
            <span class="material-icons-sharp text-primary">calendar_month</span>
            Agendar cita
        </h1>

        <form method="POST" action="{{ route('citas.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold mb-1">Mascota</label>
                <input type="text" name="mascota" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Fecha</label>
                <input type="date" name="fecha" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Hora</label>
                <input type="time" name="hora" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="rounded-full bg-accent-orange px-6 py-3 font-bold text-white hover:bg-[#e65a2a] transition">
                    Guardar cita
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>