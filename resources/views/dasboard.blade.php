<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de COMPUEDU') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        {{-- 🔹 Tarjetas estadísticas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-600 text-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-lg font-semibold">Usuarios</h3>
                <p class="text-3xl font-bold mt-2">{{ $totalUsuarios }}</p>
            </div>

            <div class="bg-green-600 text-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-lg font-semibold">Programas</h3>
                <p class="text-3xl font-bold mt-2">{{ $totalProgramas }}</p>
            </div>

            <div class="bg-purple-600 text-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-lg font-semibold">Solicitudes</h3>
                <p class="text-3xl font-bold mt-2">{{ $totalSolicitudes }}</p>
            </div>
        </div>

        {{-- 🔹 Gráfico dinámico con Chart.js --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold mb-4">Solicitudes por Mes</h3>
            <canvas id="solicitudesChart" height="120"></canvas>
        </div>

        {{-- 🔹 Últimas solicitudes --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold mb-4">Últimas Solicitudes</h3>
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Programa</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($ultimasSolicitudes as $solicitud)
                        <tr>
                            <td class="px-4 py-2">{{ $solicitud->ID_SOLICITUD }}</td>
                            <td class="px-4 py-2">{{ $solicitud->NOMBRE }}</td>
                            <td class="px-4 py-2">{{ $solicitud->programa->DESCRIPCION_PROGRAMA ?? 'N/A' }}</td>
                            <td class="px-4 py-2">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">
                                    {{ $solicitud->ESTADO }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    {{-- 🔹 Scripts para Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('solicitudesChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($solicitudesPorMes->toArray())) !!},
                datasets: [{
                    label: 'Solicitudes',
                    data: {!! json_encode(array_values($solicitudesPorMes->toArray())) !!},
                    backgroundColor: '#3B82F6',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
</x-app-layout>
