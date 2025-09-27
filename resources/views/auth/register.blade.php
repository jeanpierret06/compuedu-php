<x-guest-register-layout>
    <x-authentication-card>
        {{-- LOGO personalizado --}}
        <x-slot name="logo">
            <img src="{{ asset('images/compuedu.png') }}" alt="CompuEdu" class=" mx-auto mb-2" Width="200rem">
            <h1 class="text-2xl font-bold text-compuedu-green text-center">Crea tu cuenta</h1>
            <p class="text-gray-600 text-center text-sm mt-1">
                Regístrate para acceder a cursos y contenidos digitales
            </p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nombre completo') }}" class="text-compuedu-green font-semibold" />
                <x-input id="name"
                         class="block mt-1 w-full rounded-lg border-gray-300 focus:border-compuedu-green focus:ring-compuedu-green"
                         type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo electrónico') }}" class="text-compuedu-green font-semibold" />
                <x-input id="email"
                         class="block mt-1 w-full rounded-lg border-gray-300 focus:border-compuedu-green focus:ring-compuedu-green"
                         type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" class="text-compuedu-green font-semibold" />
                <x-input id="password"
                         class="block mt-1 w-full rounded-lg border-gray-300 focus:border-compuedu-green focus:ring-compuedu-green"
                         type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" class="text-compuedu-green font-semibold" />
                <x-input id="password_confirmation"
                         class="block mt-1 w-full rounded-lg border-gray-300 focus:border-compuedu-green focus:ring-compuedu-green"
                         type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-compuedu-blue hover:text-compuedu-green transition-colors duration-300"
                   href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
                </a>

                <x-button class="px-6 py-2 bg-compuedu-green hover:bg-green-600 text-white font-bold rounded-lg transition-colors duration-300">
                    {{ __('Registrarme') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
