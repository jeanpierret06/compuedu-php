<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar si usas políticas de acceso
    }

    public function rules(): array
    {
        return [
            'DESCRIPCION_PROGRAMA' => 'required|string|max:255|unique:programa,DESCRIPCION_PROGRAMA',
            'MALLA_CURRICULAR'     => 'nullable|string|max:255',
            'COSTO_SEMESTRE'       => 'required|numeric|min:0',
            'PROGRAMA'             => 'nullable|string|max:255',
            'UNIVERSIDAD'          => 'required|string|max:255',
            'MODALIDAD'            => 'required|string|in:Presencial,Virtual,Mixta',
        ];
    }

    public function messages(): array
    {
        return [
            'DESCRIPCION_PROGRAMA.required' => 'La descripción del programa es obligatoria.',
            'DESCRIPCION_PROGRAMA.unique'   => 'Ya existe un programa con esta descripción.',
            'COSTO_SEMESTRE.required'       => 'Debe especificar el costo del semestre.',
            'COSTO_SEMESTRE.numeric'        => 'El costo del semestre debe ser un número.',
            'UNIVERSIDAD.required'          => 'Debe indicar la universidad.',
            'MODALIDAD.in'                  => 'La modalidad debe ser Presencial, Virtual o Mixta.',
        ];
    }
}
