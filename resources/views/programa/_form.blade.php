<div class="space-y-4">
    <div>
        <label class="block font-medium">Descripción del Programa</label>
        <input type="text" name="DESCRIPCION_PROGRAMA" 
               value="{{ old('DESCRIPCION_PROGRAMA', $programa->DESCRIPCION_PROGRAMA ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('DESCRIPCION_PROGRAMA') 
            <small class="text-red-600">{{ $message }}</small> 
        @enderror
    </div>

    <div>
        <label class="block font-medium">Malla Curricular</label>
        <input type="text" name="MALLA_CURRICULAR" 
               value="{{ old('MALLA_CURRICULAR', $programa->MALLA_CURRICULAR ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('MALLA_CURRICULAR') 
            <small class="text-red-600">{{ $message }}</small> 
        @enderror
    </div>

    <div>
        <label class="block font-medium">Costo del Semestre</label>
        <input type="number" step="0.01" name="COSTO_SEMESTRE" 
               value="{{ old('COSTO_SEMESTRE', $programa->COSTO_SEMESTRE ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('COSTO_SEMESTRE') 
            <small class="text-red-600">{{ $message }}</small> 
        @enderror
    </div>

    <div>
        <label class="block font-medium">Código / Programa</label>
        <input type="text" name="PROGRAMA" 
               value="{{ old('PROGRAMA', $programa->PROGRAMA ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('PROGRAMA') 
            <small class="text-red-600">{{ $message }}</small> 
        @enderror
    </div>

    <div>
        <label class="block font-medium">Universidad</label>
        <input type="text" name="UNIVERSIDAD" 
               value="{{ old('UNIVERSIDAD', $programa->UNIVERSIDAD ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('UNIVERSIDAD') 
            <small class="text-red-600">{{ $message }}</small> 
        @enderror
    </div>

    <div>
        <label class="block font-medium">Modalidad</label>
        <select name="MODALIDAD" class="w-full border rounded px-3 py-2">
            <option value="Presencial" @selected(old('MODALIDAD', $programa->MODALIDAD ?? '') == 'Presencial')>Presencial</option>
            <option value="Virtual" @selected(old('MODALIDAD', $programa->MODALIDAD ?? '') == 'Virtual')>Virtual</option>
            <option value="Mixta" @selected(old('MODALIDAD', $programa->MODALIDAD ?? '') == 'Mixta')>Mixta</option>
        </select>
        @error('MODALIDAD') 
            <small class="text-red-600">{{ $message }}</small> 
        @enderror
    </div>
</div>
