<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProgramaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'DESCRIPCION_PROGRAMA' => [
                'required',
                'string',
                'max:255',
                Rule::unique('programa', 'DESCRIPCION_PROGRAMA')->ignore($this->programa),
            ],
            'MALLA_CURRICULAR' => 'nullable|string|max:255',
            'COSTO_SEMESTRE'   => 'required|numeric|min:0',
            'PROGRAMA'         => 'nullable|string|max:255',
            'UNIVERSIDAD'      => 'required|string|max:255',
            'MODALIDAD'        => 'required|string|in:Presencial,Virtual,Mixta',
        ];
    }

    public function messages(): array
    {
        return [
            'DESCRIPCION_PROGRAMA.required' => 'La descripción del programa es obligatoria.',
            'DESCRIPCION_PROGRAMA.unique'   => 'Ya existe otro programa con esta descripción.',
        ];
    }
}
