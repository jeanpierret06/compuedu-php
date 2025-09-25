<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow p-6 rounded">
                <form action="{{ route('solicitud.update', $solicitud->ID_SOLICITUD) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    @include('solicitudes._form', ['solicitud' => $solicitud])

                    <div class="flex gap-3 pt-4">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Actualizar</button>
                        <a href="{{ route('solicitud.index') }}" class="px-4 py-2 border rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
