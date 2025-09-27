<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Solicitudes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('solicitud.create') }}" 
                   class="mb-4 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    + Nuevo Usuario
                </a>

                <table id="solicitudes" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha Solicitud</th>
                            <th>Estado</th>
                            <th>Programa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $s)
                            <tr>
                                <td>{{ $s->ID_SOLICITUD }}</td>
                                <td>{{ $s->NOMBRE }}</td>
                                <td>{{ optional($s->FECHA_SOLICITUD)->format('d/m/Y') }}</td>
                                <td>
                                    @if($s->ESTADO == 1)
                                        <span class="px-2 py-1 bg-green-200 text-green-800 rounded">Aprobada</span>
                                    @else
                                        <span class="px-2 py-1 bg-red-200 text-red-800 rounded">Pendiente</span>
                                    @endif
                                </td>
                                <td>{{ $s->programa->DESCRIPCION_PROGRAMA ?? 'Sin carrera' }}</td>
                                <td class="flex gap-2">
                                    <a href="{{ route('solicitud.edit', $s->ID_SOLICITUD) }}" 
                                       class="px-2 py-1 bg-blue-600 text-white rounded">Editar</a>
                                    <form action="{{ route('solicitud.destroy', $s->ID_SOLICITUD) }}" method="POST" 
                                          onsubmit="return confirm('¿Seguro que deseas eliminar esta solicitud?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-2 py-1 bg-red-600 text-white rounded">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    {{-- jQuery + DataTables + Buttons --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(function () {
            $('#solicitudes').DataTable({
                pageLength: 20,
                dom: 'Bfrtip',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
</x-app-layout>
