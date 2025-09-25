<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Programa') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('programa.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @include('programa._form', ['programa' => null])

                    <div class="flex gap-3 pt-4">
                        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Guardar
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
