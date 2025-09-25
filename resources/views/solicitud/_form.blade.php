<div class="space-y-4">
    <div>
        <label for="NOMBRE" class="block text-sm font-medium">Nombre</label>
        <input type="text" name="NOMBRE" id="NOMBRE"
               class="w-full border rounded p-2"
               value="{{ old('NOMBRE', $solicitud->NOMBRE ?? '') }}" required>
        @error('NOMBRE') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="PROGRAMA_ID" class="block text-sm font-medium">Programa</label>
        <select name="PROGRAMA_ID" id="PROGRAMA_ID" class="w-full border rounded p-2" required>
            <option value="">-- Seleccione --</option>
            @foreach($programas as $p)
                <option value="{{ $p->ID_PROGRAMA }}"
                    {{ old('PROGRAMA_ID', $solicitud->PROGRAMA_ID ?? '') == $p->ID_PROGRAMA ? 'selected' : '' }}>
                    {{ $p->DESCRIPCION_PROGRAMA }}
                </option>
            @endforeach
        </select>
        @error('PROGRAMA_ID') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="FECHA_SOLICITUD" class="block text-sm font-medium">Fecha de solicitud</label>
        <input type="date" name="FECHA_SOLICITUD" id="FECHA_SOLICITUD"
               class="w-full border rounded p-2"
               value="{{ old('FECHA_SOLICITUD', isset($solicitud) ? $solicitud->FECHA_SOLICITUD->format('Y-m-d') : '') }}" required>
        @error('FECHA_SOLICITUD') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="ESTADO" class="block text-sm font-medium">Estado</label>
        <select name="ESTADO" id="ESTADO" class="w-full border rounded p-2">
            <option value="0" {{ old('ESTADO', $solicitud->ESTADO ?? '') == 0 ? 'selected' : '' }}>Pendiente</option>
            <option value="1" {{ old('ESTADO', $solicitud->ESTADO ?? '') == 1 ? 'selected' : '' }}>Aprobada</option>
        </select>
        @error('ESTADO') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
</div>
