<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Programas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <table id="programa" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Malla curricular</th>
                            <th>Costo semestre</th>
                            <th>programa</th>
                            <th>Universidad</th>
                            <th>Modalidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <a href="{{ route('programa.create') }}" 
   class="mb-4 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
    + Nuevo Programa
</a>

                    <tbody>
                        @foreach($programas as $s)
                            <tr>
                                <td>{{ $s->ID_PROGRAMA }}</td>
                                <td>{{ $s->DESCRIPCION_PROGRAMA }}</td>
                                <td>{{ $s->MALLA_CURRICULAR }}</td>
                                <td>{{ number_format($s->COSTO_SEMESTRE, 0, ',', '.') }}</td>
                                <td>{{ $s->PROGRAMA }}</td>
                                <td>{{ $s->UNIVERSIDAD }}</td>
                                <td>{{ $s->MODALIDAD }}</td>
                                <td>
                                    <a href="{{ route('programa.edit', $s->ID_PROGRAMA) }}" class="px-2 py-1 bg-blue-500 text-white rounded">Editar</a>
                                    <form action="{{ route('programa.destroy', $s->ID_PROGRAMA) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar este programa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded">Eliminar</button>
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
            $('#programa').DataTable({
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
