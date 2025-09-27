<x-guest-layout >
    <x-authentication-card>
        {{-- LOGO personalizado --}}
        <x-slot name="logo">
            <img src="{{ asset('images/compuedu.png') }}" alt="CompuEdu" class="mx-auto mb-2" width="200rem">
            <h1 class="text-2xl font-bold text-compuedu-green text-center">Bienvenido a CompuEdu</h1>
            <p class="text-gray-600 text-center text-sm mt-1">Plataforma educativa de cursos y contenidos digitales</p>
        </x-slot>

        {{-- Errores de validación --}}
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        {{-- Formulario --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo electrónico') }}" class="text-compuedu-green font-semibold" />
                <x-input id="email"
                         class="block mt-1 w-full rounded-lg border-gray-300 focus:border-compuedu-green focus:ring-compuedu-green"
                         type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" class="text-compuedu-green font-semibold" />
                <x-input id="password"
                         class="block mt-1 w-full rounded-lg border-gray-300 focus:border-compuedu-green focus:ring-compuedu-green"
                         type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="text-compuedu-green focus:ring-compuedu-green" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-compuedu-blue hover:text-compuedu-green transition-colors duration-300"
                       href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-center mt-6">
                <x-button class="px-6 py-2 bg-compuedu-green hover:bg-green-600 text-white font-bold rounded-lg transition-colors duration-300">
                    {{ __('Iniciar Sesión') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-register-layout>
