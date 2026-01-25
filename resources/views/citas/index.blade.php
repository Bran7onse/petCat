<x-layouts.app title="Historial de citas">
    <div class="p-8 bg-white dark:bg-zinc-900 rounded-3xl shadow-sm border border-zinc-200 dark:border-zinc-800">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-zinc-800 dark:text-white flex items-center gap-2">
                <span class="p-2 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-xl">📅</span>
                Historial de citas
            </h1>
        </div>

        <div class="overflow-hidden rounded-xl border border-zinc-100 dark:border-zinc-800">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50 dark:bg-zinc-800/50 text-zinc-500 dark:text-zinc-400 uppercase text-xs font-semibold tracking-wider">
                        <th class="px-6 py-4">Fecha</th>
                        <th class="px-6 py-4">Hora</th>
                        <th class="px-6 py-4">Mascota</th>
                        <th class="px-6 py-4 text-center">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
                    @foreach($citas as $cita)
                    <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30 transition-colors">
                        <td class="px-6 py-4 text-sm text-zinc-700 dark:text-zinc-300 font-medium">
                            {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">
                            {{ $cita->hora }}
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-800 dark:text-zinc-200 font-semibold">
                            {{ $cita->mascota }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @php
                            $color = match($cita->estado) {
                            'confirmada' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                            'pendiente' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                            'cancelada' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                            default => 'bg-zinc-100 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-400',
                            };
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $color }}">
                                {{ ucfirst($cita->estado) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>