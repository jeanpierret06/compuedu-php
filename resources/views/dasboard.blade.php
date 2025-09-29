<x-app-layout>
    {{-- ✅ Encabezado principal --}}
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-compuedu-green">
                Panel de Administración
            </h2>
            <a href="{{ route('home') }}"
               class="px-4 py-2 bg-compuedu-green text-white rounded-lg hover:bg-green-700 transition">
                Ir al Inicio
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

        {{-- 🔹 Tarjetas estadísticas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-md border-t-4 border-compuedu-green">
                <h3 class="text-lg font-semibold text-gray-700">Usuarios</h3>
                <p class="text-4xl font-extrabold text-compuedu-green mt-2">{{ $totalUsuarios }}</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md border-t-4 border-compuedu-green">
                <h3 class="text-lg font-semibold text-gray-700">Programas</h3>
                <p class="text-4xl font-extrabold text-compuedu-green mt-2">{{ $totalProgramas }}</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md border-t-4 border-compuedu-green">
                <h3 class="text-lg font-semibold text-gray-700">Solicitudes</h3>
                <p class="text-4xl font-extrabold text-compuedu-green mt-2">{{ $totalSolicitudes }}</p>
            </div>
        </div>

        {{-- 🔹 Gráfico de solicitudes por mes --}}
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h3 class="text-xl font-bold text-gray-700 mb-4">Solicitudes por Mes</h3>
            <canvas id="solicitudesChart" height="120"></canvas>
        </div>

        {{-- 🔹 Últimas solicitudes --}}
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h3 class="text-xl font-bold text-gray-700 mb-4">Últimas Solicitudes</h3>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-compuedu-green text-white">
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
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                                    {{ $solicitud->ESTADO }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Chart.js --}}
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
                    backgroundColor: '#22c55e'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });
    </script>
</x-app-layout>
