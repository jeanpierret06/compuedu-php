<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                {{-- Errores globales --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('usuario.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @include('usuarios._form', ['usuario' => null, 'roles' => $roles])

                    <div class="flex gap-3 pt-4">
                        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Guardar
                        </button>
                        <a href="{{ route('usuario.index') }}" class="px-4 py-2 border rounded">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
