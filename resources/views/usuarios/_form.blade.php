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

    <div>
        <label class="block font-medium">Rol</label>
        <select name="ROL_ID_USUA_ROL" class="w-full border rounded px-3 py-2">
            <option value="">-- Seleccione un rol --</option>
            @foreach($roles as $rol)
                <option value="{{ $rol->ID_USUA_ROL }}"
                    @selected(old('ROL_ID_USUA_ROL', $usuario->ROL_ID_USUA_ROL ?? '') == $rol->ID_USUA_ROL)>
                    {{ $rol->NOMBRE_ROL }}
                </option>
            @endforeach
        </select>
        @error('ROL_ID_USUA_ROL') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>
</div>
