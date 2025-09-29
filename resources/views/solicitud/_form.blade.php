<div>
    <label for="NOMBRE">Nombre</label>
    <input type="text" name="NOMBRE" 
           value="{{ old('NOMBRE', $solicitud->NOMBRE ?? '') }}" 
           class="border rounded p-2 w-full">
</div>

<div>
    <label for="ID_PROGRAMA">Programa</label>
    <select name="ID_PROGRAMA" class="border rounded p-2 w-full">
        @foreach ($programas as $programa)
            <option value="{{ $programa->ID_PROGRAMA }}" 
                {{ old('ID_PROGRAMA', $solicitud->ID_PROGRAMA ?? '') == $programa->ID_PROGRAMA ? 'selected' : '' }}>
                {{ $programa->DESCRIPCION_PROGRAMA }}
            </option>
        @endforeach
    </select>
</div>

<div>
    <label for="FECHA_SOLICITUD">Fecha de Solicitud</label>
    <input type="date" name="FECHA_SOLICITUD" 
           value="{{ old('FECHA_SOLICITUD', $solicitud->FECHA_SOLICITUD ?? '') }}" 
           class="border rounded p-2 w-full">
</div>

<div>
    <label for="ESTADO">Estado</label>
    <select name="ESTADO" class="border rounded p-2 w-full">
        <option value="0" {{ old('ESTADO', $solicitud->ESTADO ?? '') == 0 ? 'selected' : '' }}>Pendiente</option>
        <option value="1" {{ old('ESTADO', $solicitud->ESTADO ?? '') == 1 ? 'selected' : '' }}>Aprobada</option>
    </select>
</div>
