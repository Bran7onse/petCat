<x-layouts.app title="Mis recordatorios">
    <div class="p-6 bg-white rounded-3xl shadow">
        <h1 class="text-2xl font-bold mb-4">🔔 Mis recordatorios</h1>

        <table class="w-full text-sm">
            <thead>
                <tr>
                    <th>Mensaje</th>
                    <th>Fecha envío</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recordatorios as $r)
                <tr class="border-b">
                    <td>{{ $r->mensaje }}</td>
                    <td>{{ $r->fecha_envio }}</td>
                    <td>
                        {{ $r->enviado ? 'Enviado ✅' : 'Pendiente ⏳' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>