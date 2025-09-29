<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolicitudRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'NOMBRE'          => 'required|string|max:100',
        'ID_PROGRAMA' => 'required|exists:programa,ID_PROGRAMA',
        'FECHA_SOLICITUD' => 'required|date',
        'ESTADO'          => 'required|in:0,1',
    ];
}

    public function messages(): array
    {
        return [
            'NOMBRE.required'      => 'El nombre es obligatorio.',
            'ID_PROGRAMA.required' => 'Debe seleccionar un programa.',
            'FECHA_SOLICITUD.date' => 'La fecha no es válida.',
            'ESTADO.in'            => 'El estado debe ser 0 (pendiente) o 1 (aprobada).',
        ];
    }
}
