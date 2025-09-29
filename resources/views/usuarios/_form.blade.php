<div class="space-y-4">
    <div>
        <label class="block font-medium">Nombre</label>
        <input type="text" name="NOMBRE_USUARIO"
               value="{{ old('NOMBRE_USUARIO', $usuario->NOMBRE_USUARIO ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('NOMBRE_USUARIO') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div>
        <label class="block font-medium">Apellido</label>
        <input type="text" name="APELLIDO_USUARIO"
               value="{{ old('APELLIDO_USUARIO', $usuario->APELLIDO_USUARIO ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('APELLIDO_USUARIO') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div>
        <label class="block font-medium">Teléfono</label>
        <input type="text" name="TELEFONO_USUARIO"
               value="{{ old('TELEFONO_USUARIO', $usuario->TELEFONO_USUARIO ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('TELEFONO_USUARIO') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div>
        <label class="block font-medium">Correo electrónico</label>
        <input type="email" name="EMAIL_USUARIO"
               value="{{ old('EMAIL_USUARIO', $usuario->EMAIL_USUARIO ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('EMAIL_USUARIO') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>
</div>
