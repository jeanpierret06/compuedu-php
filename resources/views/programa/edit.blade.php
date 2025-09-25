<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Programa') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('programa.update', $programa->ID_PROGRAMA) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    @include('programa._form', ['programa' => $programa])

                    <div class="flex gap-3 pt-4">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Actualizar
                        </button>
                        <a href="{{ route('programa.index') }}" class="px-4 py-2 border rounded">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
